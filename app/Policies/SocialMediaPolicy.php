<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SocialMedia;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialMediaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SocialMedia');
    }

    public function view(AuthUser $authUser, SocialMedia $socialMedia): bool
    {
        return $authUser->can('View:SocialMedia');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SocialMedia');
    }

    public function update(AuthUser $authUser, SocialMedia $socialMedia): bool
    {
        return $authUser->can('Update:SocialMedia');
    }

    public function delete(AuthUser $authUser, SocialMedia $socialMedia): bool
    {
        return $authUser->can('Delete:SocialMedia');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SocialMedia');
    }

    public function restore(AuthUser $authUser, SocialMedia $socialMedia): bool
    {
        return $authUser->can('Restore:SocialMedia');
    }

    public function forceDelete(AuthUser $authUser, SocialMedia $socialMedia): bool
    {
        return $authUser->can('ForceDelete:SocialMedia');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SocialMedia');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SocialMedia');
    }

    public function replicate(AuthUser $authUser, SocialMedia $socialMedia): bool
    {
        return $authUser->can('Replicate:SocialMedia');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SocialMedia');
    }

}