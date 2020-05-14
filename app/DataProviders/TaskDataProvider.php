<?php


namespace App\DataProviders;

use App\Jobs\TaskDownload;
use App\Manager\FilenameExtractor;
use App\Task;
use Illuminate\Support\Facades\Storage;

class TaskDataProvider
{

    public function getTaskList()
    {
        return Task::orderBy('id', 'desc')->get();
    }

    public function addNewTask($attributes)
    {
        $task = Task::create($attributes);

        TaskDownload::dispatch($task);
    }

    public function downloadTask(Task $task)
    {
        $storageFilename = FilenameExtractor::extract($task->url, $task->id);
        $originalFilename = FilenameExtractor::clear($storageFilename, $task->id);

        if (Storage::exists($storageFilename)) {
            Storage::download($storageFilename, $originalFilename);
        }
    }
}
