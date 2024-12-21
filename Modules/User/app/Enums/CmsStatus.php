<?php

namespace Modules\User\Enums;

enum CmsStatus: string {
    case ARCHIVED = 'Archived';
    case PUBLISHED = 'Published';

    public static function getStatus(): array {
        return array_map(
            fn(self $status) => [$status->value => __($status->value)],
            self::cases()
        );
    }
}
