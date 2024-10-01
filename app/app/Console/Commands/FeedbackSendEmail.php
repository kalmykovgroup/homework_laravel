<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FeedbackSendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:feedback-send-email {email} {text}';

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
        $user = User::all()->sort(function ($a, $b) { return strcmp($a->id, $b->id); })->first();

        Mail::send(
            view: 'mail.feedback',
            data: ['text' => $this->argument('text')],
            callback: function($message) use($user){
                $message
                    ->to($user->email)
                    ->subject("Сообщение от пользователя")
                    ->from($this->argument('email'));
            }
        );

        $this->line("send successfully");

    }
}
