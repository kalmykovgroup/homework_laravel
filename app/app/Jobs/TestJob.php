<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TestJob implements ShouldQueue
{
    use Queueable;

    private string $time;
    private User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(string $time, User $user)
    {
        $this->time = $time;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        print_r($this->time);
        print_r(PHP_EOL);
        print_r($this->user->id);
    }
}
