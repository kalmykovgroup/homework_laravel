<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class Feedback implements ShouldQueue
{
    use Queueable;

    private $email;
    private $text;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email, string $text)
    {
        $this->email = $email;
        $this->text = $text;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Artisan::call('app:feedback-send-email', ['email' => $this->email, 'text' => $this->text]);
    }
}
