<?php

namespace App\Listeners;

use App\Events\CreateNewPost;
use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailUpdateStatusPost
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
    public function handle(CreateNewPost $event)
    {
        $this->sendMailToAdmin($event->baiViet);
    }

    /**
     * Send mail to admin
     *
     * @param Post $post post
     * 
     * @return void
     */
    public function sendMailToAdmin($post)
    {
        $admin = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('roles.id', 1)
            ->first();
            
        dispatch( new SendMailJob($post, $admin));
    }
}
