<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;




class TasksApiTest extends TestCase
{

    private $uri = '/api/task';
    use DatabaseMigrations;



    public function testShowAllTasks()
    {
        $this->json('GET',$this->uri)
//             ->dump();
             ->seeJson();
    }

    /**
     *
     * @group failing
     */
    public function testShowOneTask()
    {
        $task = factory(App\Task::class)->create();
        $this->json('GET', $this->uri . '/' . $task->id )
            ->seeJsonStructure([

                "id","name","done","priority"
            ])
             ->seeJsonContains([

                 "name" => $task->name,
//                 "done" => $task->done,
//                 "priority" => $task->priority

             ]);
//             ->dump();

    }
}
