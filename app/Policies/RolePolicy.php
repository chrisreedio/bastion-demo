<?php


namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any::role');
    }

    public function view(?User $user, Role $role): bool
    {
        return $user->can('view::role');
    }

    public function create(User $user): bool
    {
        return $user->can('create::role');
    }

    public function update(User $user, Role $role): bool
    {
        return $user->can('update::role');
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->can('delete::role');
    }

    public function restore(User $user, Role $role): bool
    {
        return $user->can('restore::role');
    }

    public function forceDelete(User $user, Role $role): bool
    {
        return $user->can('force_delete::role');
    }
}
