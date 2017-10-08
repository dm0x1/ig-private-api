<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * @method Model\FriendshipStatus[] getFriendshipStatuses()
 * @method string getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isFriendshipStatuses()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setFriendshipStatuses(Model\FriendshipStatus[] $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetFriendshipStatuses()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class FriendshipsShowManyResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'friendship_statuses' => 'Model\FriendshipStatus[]',
    ];
}
