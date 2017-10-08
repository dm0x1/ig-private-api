<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * @method mixed getAuth()
 * @method mixed getSequence()
 * @method mixed getTopic()
 * @method mixed getUrl()
 * @method bool isAuth()
 * @method bool isSequence()
 * @method bool isTopic()
 * @method bool isUrl()
 * @method $this setAuth(mixed $value)
 * @method $this setSequence(mixed $value)
 * @method $this setTopic(mixed $value)
 * @method $this setUrl(mixed $value)
 * @method $this unsetAuth()
 * @method $this unsetSequence()
 * @method $this unsetTopic()
 * @method $this unsetUrl()
 */
class Subscription extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'topic'    => '',
        'url'      => '',
        'sequence' => '',
        'auth'     => '',
    ];
}
