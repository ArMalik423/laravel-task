<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\Models\Task;

class TaskService extends BaseService
{
    public function getAllTask()
    {
        return Task::paginate(30);
    }

    public function createNewTask($title,$status)
    {
        return Task::create([
            'title' => $title,
            'status' => $status,
        ]);
    }

    public function updateTask($task,$title,$status)
    {
        $task->title = $title;
        $task->status = $status;
        $task->save();

        return $task;
    }
}
