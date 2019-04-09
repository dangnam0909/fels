<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\TestRepository;
use App\Repositories\UserRepository;
use App\Mail\MailTest;
use App\Jobs\SendMailForTest;

class SendMailTest extends Command
{
    protected $test;

    protected $user;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail for users make tests';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TestRepository $test, UserRepository $user)
    {
        parent::__construct();
        $this->test = $test;
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $test = $this->test->orderByRaw('RAND()', \config('setting.limit'));
        $users = $this->user->all();
        dispatch(new SendMailForTest($test, $users))->onConnection('database');
        $this->info(\Lang::get('messages.test_sent_user'));
    }
}
