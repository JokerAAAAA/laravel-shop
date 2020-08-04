<?php

namespace App\Policies;

use App\Models\Installment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstallmentPolicy
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

    /**
     * 检查权限
     *
     * @param User $user
     * @param Installment $installment
     * @return bool
     */
    public function own(User $user, Installment $installment)
    {
        return $installment->user_id = $user->id;
    }
}
