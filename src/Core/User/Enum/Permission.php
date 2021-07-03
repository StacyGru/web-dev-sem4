<?php

declare(strict_types=1);

namespace App\Core\User\Enum;

use App\Core\Common\Enum\AbstractEnum;

class Permission extends AbstractEnum
{
    public const USER_CONTACT_CREATE = 'ROLE_USER_CONTACT_CREATE';
    public const USER_SHOW = 'ROLE_USER_SHOW';
    public const USER_INDEX = 'ROLE_USER_INDEX';
    public const USER_CREATE = 'ROLE_USER_CREATE';
    public const USER_UPDATE = 'ROLE_USER_UPDATE';
    public const USER_DELETE = 'ROLE_USER_DELETE';
    public const USER_VALIDATION = 'ROLE_USER_VALIDATION';

    public const ANIMAL_UPDATE = 'ROLE_ANIMAL_UPDATE';
    public const ANIMAL_SHOW = 'ROLE_ANIMAL_SHOW';
    public const ANIMAL_INDEX = 'ROLE_ANIMAL_INDEX';
    public const ANIMAL_CREATE = 'ROLE_ANIMAL_CREATE';
    public const ANIMAL_DELETE = 'ROLE_ANIMAL_DELETE';
}
