<?php

namespace InstagramAPI;

use PDO;

class SettingsMysql
{
    private $sets;
    private $pdo;
    private $instagramUsername;

    public $dbTableName = 'user_settings';

    public function __construct($username, $mysqlOptions)
    {
        $this->instagramUsername = $username;

        if (isset($mysqlOptions['db_tablename'])) {
            $this->dbTableName = $mysqlOptions['db_tablename'];
        }

        if (isset($mysqlOptions['pdo'])) {
            // Pre-provided PDO object.
            $this->pdo = $mysqlOptions['pdo'];
        } else {
            // We should connect for the user.
            $username = (is_null($mysqlOptions['db_username']) ? 'root' : $mysqlOptions['db_username']);
            $password = (is_null($mysqlOptions['db_password']) ? '' : $mysqlOptions['db_password']);
            $host = (is_null($mysqlOptions['db_host']) ? 'localhost' : $mysqlOptions['db_host']);
            $dbName = (is_null($mysqlOptions['db_name']) ? 'instagram' : $mysqlOptions['db_name']);
            $this->connect($username, $password, $host, $dbName);
        }

        $this->autoInstall();
        $this->populateObject();
    }

    /**
     * Does a preliminary guess about whether we're logged in.
     *
     * The session it looks for may be expired, so there's no guarantee.
     *
     * @return bool
     */
    public function maybeLoggedIn()
    {
        return $this->get('id') !== null // Cannot use empty() since row can be 0.
            && !empty($this->get('username_id'))
            && !empty($this->get('token'));
    }

    public function get($key, $default = null)
    {
        if ($key == 'sets') {
            return $this->sets; // Return 'sets' itself which contains all data.
        }

        if (isset($this->sets[$key])) {
            return $this->sets[$key];
        }

        return $default;
    }

    public function set($key, $value)
    {
        if ($key == 'sets' || $key == 'username') {
            return; // Don't allow writing to special 'sets' or 'username' keys.
        }

        $this->sets[$key] = $value;
        $this->Save();
    }

    public function Save()
    {
        // Special key where we store what username these settings belong to.
        $this->sets['username'] = $this->instagramUsername;

        // Update if user already exists in db, otherwise insert.
        if (isset($this->sets['id'])) {
            $sql = "update {$this->dbTableName} set ";
            $bindList[':id'] = $this->sets['id'];
        } else {
            $sql = "insert into {$this->dbTableName} set ";
        }

        // Add all settings to storage.
        foreach ($this->sets as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            $fieldList[] = "{$key} = :{$key}";
            $bindList[":{$key}"] = $value;
        }

        $sql = $sql.implode(',', $fieldList).(isset($this->sets['id']) ? ' where id=:id' : '');
        $std = $this->pdo->prepare($sql);

        $std->execute($bindList);

        // Keep track of which database row id the user has been assigned as.
        if (!isset($this->sets['id'])) {
            $this->sets['id'] = $this->pdo->lastinsertid();
        }
    }

    private function connect($username, $password, $host, $dbName)
    {
        try {
            $pdo = new \PDO("mysql:host={$host};dbname={$dbName}", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->query('SET NAMES UTF8');
            $pdo->setAttribute(PDO::ERRMODE_WARNING, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        } catch (\PDOException $e) {
            throw new InstagramException('Cannot connect to MySQL settings adapter.', ErrorCode::INTERNAL_SETTINGS_ERROR);
        }
    }

    private function autoInstall()
    {
        // Detect the name of the MySQL database that PDO is connected to.
        $dbName = $this->pdo->query('select database()')->fetchColumn();

        $std = $this->pdo->prepare('SHOW TABLES WHERE tables_in_'.$dbName.' = :tableName');
        $std->execute([':tableName' => $this->dbTableName]);
        if ($std->rowCount()) {
            return true;
        }

        $this->pdo->exec('CREATE TABLE `'.$this->dbTableName."` (
            `id` INT(10) NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(50) NULL DEFAULT NULL,
            `username_id` BIGINT(20) NULL DEFAULT NULL,
            `devicestring` VARCHAR(255) NULL DEFAULT NULL,
            `device_id` VARCHAR(255) NULL DEFAULT NULL,
            `phone_id` VARCHAR(255) NULL DEFAULT NULL,
            `uuid` VARCHAR(255) NULL DEFAULT NULL,
            `token` VARCHAR(255) NULL DEFAULT NULL,
            `cookies` TEXT NULL,
            `date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            `last_login` BIGINT NULL DEFAULT 0,
            PRIMARY KEY (`id`),
            UNIQUE KEY `idx_username` (`username`)
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB;
        ");
    }

    private function populateObject()
    {
        $std = $this->pdo->prepare("select * from {$this->dbTableName} where username=:username");
        $std->execute([':username' => $this->instagramUsername]);
        $result = $std->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            foreach ($result as $key => $value) {
                $this->sets[$key] = $value;
            }
        }
    }
}
