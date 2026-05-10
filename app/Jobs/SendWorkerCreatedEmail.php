<?php

namespace App\Jobs;

use App\Notifications\WorkerCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWorkerCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $worker;

    /**
     * Create a new job instance.
     */
    public function __construct($worker)
    {
        $this->worker = $worker;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->worker->notify(new WorkerCreatedNotification($this->worker));
    }
}
