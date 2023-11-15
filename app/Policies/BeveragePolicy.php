<?php

namespace App\Policies;

use App\Models\Beverage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BeveragePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Beverage $beverage): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Beverage $beverage): bool
    {
    }

    public function delete(User $user, Beverage $beverage): bool
    {
    }

    public function restore(User $user, Beverage $beverage): bool
    {
    }

    public function forceDelete(User $user, Beverage $beverage): bool
    {
    }
}
