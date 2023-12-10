<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Services\TaskService;
use App\Models\Task;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success('Task Fetched Successfully',['tasks' => $this->taskService->getAllTask()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request)
    {
        $title = $request->input('title');
        $status = $request->input('status');
        try{
            $newTask = $this->taskService->createNewTask($title,$status);
        }catch (Exception $exception){
            return $this->error('Error',['errors' => ['Something Went Wrong']],400);
        }


        return $this->success('Task Created Successfully',['tasks' => $newTask]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $this->success('Task Fetched Successfully',['tasks' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $title = $request->input('title');
        $status = $request->input('status');
        try{
            $newTask = $this->taskService->updateTask($task,$title,$status);
        }catch (Exception $exception){
            return $this->error('Error',['errors' => ['Something Went Wrong']],400);
        }


        return $this->success('Task Updated Successfully',['tasks' => $newTask]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return $this->success('Task Deleted Successfully',['tasks' => $task]);
    }
}
