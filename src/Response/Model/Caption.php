<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * @method mixed getBitFlags()
 * @method mixed getContentType()
 * @method mixed getCreatedAt()
 * @method mixed getCreatedAtUtc()
 * @method mixed getDidReportAsSpam()
 * @method mixed getHasTranslation()
 * @method string getMediaId()
 * @method string getPk()
 * @method mixed getStatus()
 * @method mixed getText()
 * @method mixed getType()
 * @method User getUser()
 * @method string getUserId()
 * @method bool isBitFlags()
 * @method bool isContentType()
 * @method bool isCreatedAt()
 * @method bool isCreatedAtUtc()
 * @method bool isDidReportAsSpam()
 * @method bool isHasTranslation()
 * @method bool isMediaId()
 * @method bool isPk()
 * @method bool isStatus()
 * @method bool isText()
 * @method bool isType()
 * @method bool isUser()
 * @method bool isUserId()
 * @method $this setBitFlags(mixed $value)
 * @method $this setContentType(mixed $value)
 * @method $this setCreatedAt(mixed $value)
 * @method $this setCreatedAtUtc(mixed $value)
 * @method $this setDidReportAsSpam(mixed $value)
 * @method $this setHasTranslation(mixed $value)
 * @method $this setMediaId(string $value)
 * @method $this setPk(string $value)
 * @method $this setStatus(mixed $value)
 * @method $this setText(mixed $value)
 * @method $this setType(mixed $value)
 * @method $this setUser(User $value)
 * @method $this setUserId(string $value)
 * @method $this unsetBitFlags()
 * @method $this unsetContentType()
 * @method $this unsetCreatedAt()
 * @method $this unsetCreatedAtUtc()
 * @method $this unsetDidReportAsSpam()
 * @method $this unsetHasTranslation()
 * @method $this unsetMediaId()
 * @method $this unsetPk()
 * @method $this unsetStatus()
 * @method $this unsetText()
 * @method $this unsetType()
 * @method $this unsetUser()
 * @method $this unsetUserId()
 */
class Caption extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'status'             => '',
        'user_id'            => 'string',
        'created_at_utc'     => '',
        'created_at'         => '',
        'bit_flags'          => '',
        'user'               => 'User',
        'content_type'       => '',
        'text'               => '',
        'media_id'           => 'string',
        'pk'                 => 'string',
        'type'               => '',
        'has_translation'    => '',
        'did_report_as_spam' => '',
    ];
}
