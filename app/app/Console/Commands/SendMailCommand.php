<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use DateTime;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'top:send-mail-command {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $user_id = $this->argument('user_id');

        $user = User::find($user_id);
        if(!$user) {
            $this->line("User is not found");

            return;
        }


        Mail::send(
            view: 'mail.mail',
            data: ['name' => $user->name],
            callback: function($message) use($user){
                $message
                    ->to($user->email)
                    ->subject("Welcome to Top List")
                    ->from("to@academy.ru");
            }
        );

        $this->line("send successfully");

        TestJob::dispatch((new \DateTime())->format('Y-m-d H:i:s'), $user);
    }
}
