<?php

namespace App\Services\Factory;

use App\Models\User;

abstract class UserRole
{
    abstract public function dashboardView(): string;
}

class AdminUser extends UserRole
{
    public function dashboardView(): string {
        return 'dashboard.admin';
    }
}

class ManagerUser extends UserRole
{
    public function dashboardView(): string {
        return 'dashboard.manager';
    }
}

class EmployeeUser extends UserRole
{
    public function dashboardView(): string {
        return 'dashboard.employee';
    }
}

class UserFactory
{
    public static function create(User $user): UserRole
    {
        return match ($user->role) {
            'admin' => new AdminUser(),
            'manager' => new ManagerUser(),
            default => new EmployeeUser(),
        };
    }
}
