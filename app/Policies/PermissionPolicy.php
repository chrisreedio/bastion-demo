<?php


namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any::permission');
    }

    public function view(?User $user, Permission $permission): bool
    {
        return $user->can('view::permission');
    }

    public function create(User $user): bool
    {
        return $user->can('create::permission');
    }

    public function update(User $user, Permission $permission): bool
    {
        return $user->can('update::permission');
    }

    public function delete(User $user, Permission $permission): bool
    {
        return $user->can('delete::permission');
    }

    public function restore(User $user, Permission $permission): bool
    {
        return $user->can('restore::permission');
    }

    public function forceDelete(User $user, Permission $permission): bool
    {
        return $user->can('force_delete::permission');
    }
}
