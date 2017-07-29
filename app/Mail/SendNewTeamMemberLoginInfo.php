<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendNewTeamMemberLoginInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $tempPass;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $tempPass)
    {
        $this->user = $user;
        $this->tempPass = $tempPass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('BROKER_EMAIL'))
                ->subject('Welcome To Our Team - Please complete your login')
                ->view('mail.teammateInvitation');
    }
}
