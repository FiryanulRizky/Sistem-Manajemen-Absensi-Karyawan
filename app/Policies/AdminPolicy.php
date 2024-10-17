<?php

namespace App\Policies;

use App\Employee;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function isOwner(User $user, $admin_id) {
        return $user->employee->id === $admin_id;
    }
}
