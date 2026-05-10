<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseBooksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    use Maatwebsite\Excel\Facades\Excel;

    public function handle()
    {
        $chunkSize = 100;

        Excel::filter('chunk')->load('book_registry.xlsx')->chunk($chunkSize, function ($results) {
            foreach ($results as $row) {
                // process each book row here
            }
        });
    }
}
