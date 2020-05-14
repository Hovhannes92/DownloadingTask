<?php

namespace App\Jobs;

use App\Manager\FilenameExtractor;
use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class TaskDownload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->task->downloading();

        $url = $this->task->url;

        $content = file_get_contents($url);
        if ($content === false) {
            $this->task->error();
        }

        $storageFilename = FilenameExtractor::extract($url, $this->task->id);
        Storage::put($storageFilename, $content);

        $this->task->complete();
    }
}
