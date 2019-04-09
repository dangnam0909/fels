<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;
use App\Mail\MailTest;

class SendMailForTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;

    public $test;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($test, $users)
    {
        $this->test = $test;
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            foreach ($this->users as $user)
            {
                \Mail::to($user['email'])->send(new MailTest($this->test, $user));
            }
        } catch (Exception $e) {
            \Log::info(\Lang::get('messages.error') . $e);
            return view('errors.404');
        }

    }
}
