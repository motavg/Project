<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_tasks()
    {
        // Arrange: Create a few tasks using the Task factory
        $tasks = Task::factory()->count(3)->create();

        // Act: Make a request to the endpoint
        $response = $this->get('/api/tasks');

        // Assert: Check that the response has the correct structure and status
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'title', 'description']
        ]);
    }

    public function test_can_create_task()
    {
        // Arrange: Create a task data
        $taskData = [
            'title' => 'Test task',
            'description' => 'Test task description'
        ];

        // Act: Make a request to the endpoint
        $response = $this->post('/api/tasks', $taskData);

        // Assert: Check that the response has the correct structure and status
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 'title', 'description'
        ]);
    }

    public function test_can_get_single_task()
    {
        // Arrange: Create a task using the Task factory
        $task = Task::factory()->create();

        // Act: Make a request to the endpoint
        $response = $this->get('/api/tasks/' . $task->id);

        // Assert: Check that the response has the correct structure and status
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'title', 'description'
        ]);
    }

    public function test_can_update_task()
    {
        // Arrange: Create a task using the Task factory
        $task = Task::factory()->create();

        // Arrange: Create a task data
        $taskData = [
            'title' => 'Updated task',
            'description' => 'Updated task description'
        ];

        // Act: Make a request to the endpoint
        $response = $this->put('/api/tasks/' . $task->id, $taskData);

        // Assert: Check that the response has the correct structure and status
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'title', 'description'
        ]);
    }

    public function test_can_delete_task()
    {
        // Arrange: Create a task using the Task factory
        $task = Task::factory()->create();

        // Act: Make a request to the endpoint
        $response = $this->delete('/api/tasks/' . $task->id);

        // Assert: Check that the response has the correct status
        $response->assertStatus(204);
    }
}
