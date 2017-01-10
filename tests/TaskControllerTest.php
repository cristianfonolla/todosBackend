<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Spatie\Permission\Models\Role;
/**
 * Class TasksControllerTest
 */
class TasksControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @group failing
     */
    public function testAuthorizedIndex()
    {
        //1 Preparation
        $user = $this->login();
        Role::create(["name" => "admin"]);
        $user->assignRole('admin');
        //2 Execució
        $this->get('tasks');
        //3 Asserts
        $this->assertResponseOk();
    }
    /**
     *
     */
    public function testNotAuthorizedIndex()
    {
        //1 Preparation
        $this->login();
        //2 Execució
        $this->get('tasks');
        //3 Asserts
        $this->assertResponseStatus(403);
    }

    /**
     * @return mixed
     */
    protected function login()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
        return $user;
    }
    /**
     *
     */
    public function testIndex()
    {
        //api
//        $this->get('api/v1/tasks');
//        $this->call('get','api/v1/tasks');
        //web
        $user = factory(App\User::class)->create();
        $this->actingAs($user)->get('tasks1');
//        dd($response);
        //Debug:
//        $this->get('tasks1')->dump();
        $this->assertViewHas('tasks');
        // getData() returns all vars attached to the response.
//        dd($this->response->getOriginalContent());
        $tasks = $this->response->getOriginalContent()->getData()['tasks'];
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $tasks);
    }

}