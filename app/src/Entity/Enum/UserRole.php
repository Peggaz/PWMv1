<?php
/**
 * User role.
 */

namespace App\Entity\Enum;

/**
 * Enum UserRole.
 */
enum UserRole: string
{
    case ROLE_USER = 'ROLE_USER';
    case ROLE_ADMIN = 'ROLE_ADMIN';

    public function labelOne(): string
    {
        if ($this == UserRole::ROLE_USER) {
            return 'label.role_user';
        } elseif ($this == UserRole::ROLE_ADMIN) {
            return 'label.role_admin';
        }

        return "";
    }

    /**
     * Get the role label.
     *
     * @return string Role label
     */
    public function label(): string
    {
        return match ($this) {
            UserRole::ROLE_USER => 'label.role_user',
            UserRole::ROLE_ADMIN => 'label.role_admin',
        };
    }
}
