<?php
namespace App\Http\Controllers;
use App\Repositories\TaskRepository;
use App\Task;
use App\Transformers\TaskTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
class TasksController extends Controller
{
    protected $repository;

    /**
     * TasksController constructor.
     */
    public function __construct(TaskTransformer $transformer, TaskRepository $repository)
    {

        parent::__construct($transformer);

        $this->repository = $repository;


    }



    public function index(Request $request)
    {
        // No metadata
        // Pagination
        // No error messages
        // Transformations: hem de transformar el que ensenyem
        $tasks = Task::paginate(15);
        return $this->generatePaginatedResponse($tasks,["propietari" => "Sergi Tur"]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        $request->input('name');
//        dd($request->all());
        Task::create($request->all());
//        Task::create($request->all());
    }

    public function show($id)
    {
//        $task = Task::findOrFail($id);
        $task = $this->repository->find($id);
        return $this->transformer->transform($task);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }
}