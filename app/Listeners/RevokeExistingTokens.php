<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RevokeExistingTokens
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $user = User::find($event->userId);
        // $tokens = $user->tokens()->orderBy('created_at', 'DESC')->get();
        
        // $user->tokens()->get()->map(function ($token) {
        //     $token->revoke();
        // });
    }
}
