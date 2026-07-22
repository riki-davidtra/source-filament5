<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AppSocial;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppSocialPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AppSocial');
    }

    public function view(AuthUser $authUser, AppSocial $appSocial): bool
    {
        return $authUser->can('View:AppSocial');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AppSocial');
    }

    public function update(AuthUser $authUser, AppSocial $appSocial): bool
    {
        return $authUser->can('Update:AppSocial');
    }

    public function delete(AuthUser $authUser, AppSocial $appSocial): bool
    {
        return $authUser->can('Delete:AppSocial');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:AppSocial');
    }

    public function restore(AuthUser $authUser, AppSocial $appSocial): bool
    {
        return $authUser->can('Restore:AppSocial');
    }

    public function forceDelete(AuthUser $authUser, AppSocial $appSocial): bool
    {
        return $authUser->can('ForceDelete:AppSocial');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AppSocial');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AppSocial');
    }

    public function replicate(AuthUser $authUser, AppSocial $appSocial): bool
    {
        return $authUser->can('Replicate:AppSocial');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AppSocial');
    }

}