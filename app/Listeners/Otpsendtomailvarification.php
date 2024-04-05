<?php

namespace App\Listeners;

use App\Events\Sendemailvarificationotp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use App\Models\User;

class Otpsendtomailvarification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Sendemailvarificationotp $event): void
    {
        $user=$event->userdata; 
        $userotp=$event->userotp;

       User::where('id',$user->id)->update([
        'otp'=> $userotp,
        'otp_created_at'=>Carbon::now(),
       ]);
    }
}
