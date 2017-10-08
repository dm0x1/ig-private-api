<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * @method mixed getHasMore()
 * @method mixed getHashtags()
 * @method string getMessage()
 * @method mixed getPlaces()
 * @method mixed getRankToken()
 * @method string getStatus()
 * @method mixed getUsers()
 * @method Model\_Message[] get_Messages()
 * @method bool isHasMore()
 * @method bool isHashtags()
 * @method bool isMessage()
 * @method bool isPlaces()
 * @method bool isRankToken()
 * @method bool isStatus()
 * @method bool isUsers()
 * @method bool is_Messages()
 * @method $this setHasMore(mixed $value)
 * @method $this setHashtags(mixed $value)
 * @method $this setMessage(mixed $value)
 * @method $this setPlaces(mixed $value)
 * @method $this setRankToken(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this setUsers(mixed $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetHasMore()
 * @method $this unsetHashtags()
 * @method $this unsetMessage()
 * @method $this unsetPlaces()
 * @method $this unsetRankToken()
 * @method $this unsetStatus()
 * @method $this unsetUsers()
 * @method $this unset_Messages()
 */
class FBSearchResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'has_more'   => '',
        'hashtags'   => '',
        'users'      => '',
        'places'     => '',
        'rank_token' => '',
    ];
}
