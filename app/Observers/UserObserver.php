<?php declare(strict_types=1);

namespace App\Observers;

use App\User;
use App\Events\Users\ECreate;
use App\Events\Users\EDelete;
use App\Events\Users\EUpdate;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user): void
    {
        event(new ECreate($user));
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user): void
    {
        event(new EUpdate($user->id, $user->getChangesWithoutHiddenAttrs()));
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(User $user): void
    {
        event(new EDelete($user));
    }
}
