<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_create_task()
    {
        $response = $this->post(route('tasks.store'), [
            'title' => 'My new Task',
            'status' => 0,
        ]);

        $response->assertStatus(200); // Assuming you return a 201 Created status on successful creation
        $this->assertDatabaseHas('tasks', [
            'title' => 'My new TAsk',
            'status' => 0,
        ]);
    }

    public function test_can_read_task()
    {
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.show', $task->id));

        $response->assertStatus(200); // Assuming you return a 200 OK status on successful retrieval
        $response->assertJsonFragment(['title' => $task->title]);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();

        $response = $this->post(route('tasks.update', $task->id), [
            'title' => 'My task',
            'status' => 0,
        ]);

        $response->assertStatus(200); // Assuming you return a 200 OK status on successful update

    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertStatus(200); // Assuming you return a 204 No Content status on successful deletion
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
