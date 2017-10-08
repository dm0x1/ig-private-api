<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * @method ActionBadge getActionBadge()
 * @method mixed getCanonical()
 * @method mixed getHasNewer()
 * @method mixed getHasOlder()
 * @method User getInviter()
 * @method mixed getIsPin()
 * @method mixed getIsSpam()
 * @method DirectThreadItem[] getItems()
 * @method mixed getLastActivityAt()
 * @method mixed getLastActivityAtSecs()
 * @method PermanentItem getLastPermanentItem()
 * @method DirectThreadLastSeenAt[] getLastSeenAt()
 * @method User[] getLeftUsers()
 * @method mixed getMuted()
 * @method mixed getNamed()
 * @method mixed getNewestCursor()
 * @method mixed getOldestCursor()
 * @method mixed getPending()
 * @method string getThreadId()
 * @method mixed getThreadTitle()
 * @method mixed getThreadType()
 * @method mixed getUnseenCount()
 * @method User[] getUsers()
 * @method string getViewerId()
 * @method bool isActionBadge()
 * @method bool isCanonical()
 * @method bool isHasNewer()
 * @method bool isHasOlder()
 * @method bool isInviter()
 * @method bool isIsPin()
 * @method bool isIsSpam()
 * @method bool isItems()
 * @method bool isLastActivityAt()
 * @method bool isLastActivityAtSecs()
 * @method bool isLastPermanentItem()
 * @method bool isLastSeenAt()
 * @method bool isLeftUsers()
 * @method bool isMuted()
 * @method bool isNamed()
 * @method bool isNewestCursor()
 * @method bool isOldestCursor()
 * @method bool isPending()
 * @method bool isThreadId()
 * @method bool isThreadTitle()
 * @method bool isThreadType()
 * @method bool isUnseenCount()
 * @method bool isUsers()
 * @method bool isViewerId()
 * @method $this setActionBadge(ActionBadge $value)
 * @method $this setCanonical(mixed $value)
 * @method $this setHasNewer(mixed $value)
 * @method $this setHasOlder(mixed $value)
 * @method $this setInviter(User $value)
 * @method $this setIsPin(mixed $value)
 * @method $this setIsSpam(mixed $value)
 * @method $this setItems(DirectThreadItem[] $value)
 * @method $this setLastActivityAt(mixed $value)
 * @method $this setLastActivityAtSecs(mixed $value)
 * @method $this setLastPermanentItem(PermanentItem $value)
 * @method $this setLastSeenAt(DirectThreadLastSeenAt[] $value)
 * @method $this setLeftUsers(User[] $value)
 * @method $this setMuted(mixed $value)
 * @method $this setNamed(mixed $value)
 * @method $this setNewestCursor(mixed $value)
 * @method $this setOldestCursor(mixed $value)
 * @method $this setPending(mixed $value)
 * @method $this setThreadId(string $value)
 * @method $this setThreadTitle(mixed $value)
 * @method $this setThreadType(mixed $value)
 * @method $this setUnseenCount(mixed $value)
 * @method $this setUsers(User[] $value)
 * @method $this setViewerId(string $value)
 * @method $this unsetActionBadge()
 * @method $this unsetCanonical()
 * @method $this unsetHasNewer()
 * @method $this unsetHasOlder()
 * @method $this unsetInviter()
 * @method $this unsetIsPin()
 * @method $this unsetIsSpam()
 * @method $this unsetItems()
 * @method $this unsetLastActivityAt()
 * @method $this unsetLastActivityAtSecs()
 * @method $this unsetLastPermanentItem()
 * @method $this unsetLastSeenAt()
 * @method $this unsetLeftUsers()
 * @method $this unsetMuted()
 * @method $this unsetNamed()
 * @method $this unsetNewestCursor()
 * @method $this unsetOldestCursor()
 * @method $this unsetPending()
 * @method $this unsetThreadId()
 * @method $this unsetThreadTitle()
 * @method $this unsetThreadType()
 * @method $this unsetUnseenCount()
 * @method $this unsetUsers()
 * @method $this unsetViewerId()
 */
class DirectThread extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'named'                 => '',
        'users'                 => 'User[]',
        'has_newer'             => '',
        'viewer_id'             => 'string',
        'thread_id'             => 'string',
        'last_activity_at'      => '',
        'newest_cursor'         => '',
        'is_spam'               => '',
        'has_older'             => '',
        'oldest_cursor'         => '',
        'left_users'            => 'User[]',
        'muted'                 => '',
        'items'                 => 'DirectThreadItem[]',
        'thread_type'           => '',
        'thread_title'          => '',
        'canonical'             => '',
        'inviter'               => 'User',
        'pending'               => '',
        'last_seen_at'          => 'DirectThreadLastSeenAt[]',
        'unseen_count'          => '',
        'action_badge'          => 'ActionBadge',
        'last_activity_at_secs' => '',
        'last_permanent_item'   => 'PermanentItem',
        'is_pin'                => '',
    ];
}
