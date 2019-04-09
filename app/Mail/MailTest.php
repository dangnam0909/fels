<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $test;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($test, $user)
    {
        $this->test = $test;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(\Lang::get('test.subject'))
            ->markdown('mail.mail_test', [
                'full_name' => $this->user->full_name,
                'test_name' => $this->test[0]->test_name,
                'url' => route('tests.show', $this->test[0]->id),
            ]);
    }
}
