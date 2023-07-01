<?php


namespace App\Enums;

class NewsStatus
{
    public static $DRAFT = 'draft';
    public static $ACTIVE = 'active';
    public static $BLOCKED = 'blocked';

    public static function all(): array
    {
        return [
            self::$DRAFT,
            self::$ACTIVE,
            self::$BLOCKED,
        ];
    }
}
