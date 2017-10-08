<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * @method mixed getAndroidClass()
 * @method mixed getCallToActionTitle()
 * @method mixed getDeeplinkUri()
 * @method mixed getLinkType()
 * @method mixed getPackage()
 * @method mixed getRedirectUri()
 * @method mixed getWebUri()
 * @method bool isAndroidClass()
 * @method bool isCallToActionTitle()
 * @method bool isDeeplinkUri()
 * @method bool isLinkType()
 * @method bool isPackage()
 * @method bool isRedirectUri()
 * @method bool isWebUri()
 * @method $this setAndroidClass(mixed $value)
 * @method $this setCallToActionTitle(mixed $value)
 * @method $this setDeeplinkUri(mixed $value)
 * @method $this setLinkType(mixed $value)
 * @method $this setPackage(mixed $value)
 * @method $this setRedirectUri(mixed $value)
 * @method $this setWebUri(mixed $value)
 * @method $this unsetAndroidClass()
 * @method $this unsetCallToActionTitle()
 * @method $this unsetDeeplinkUri()
 * @method $this unsetLinkType()
 * @method $this unsetPackage()
 * @method $this unsetRedirectUri()
 * @method $this unsetWebUri()
 */
class AndroidLinks extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'linkType'          => '',
        'webUri'            => '',
        'androidClass'      => '',
        'package'           => '',
        'deeplinkUri'       => '',
        'callToActionTitle' => '',
        'redirectUri'       => '',
    ];
}
