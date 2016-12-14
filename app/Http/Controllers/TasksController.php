<?php
namespace App\Http\Controllers;
use App\Repositories\TaskRepository;
use App\Task;
use App\Transformers\TaskTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;


/**
 * Class TasksController
 *
 * Descripcio llarga
 *
 *
 *@package App\Http\Controllers
 *
 */

class TasksController extends Controller
{
    /**
     * Repository object
     *
     * @var TaskRepository
     */
    protected $repository;

    /**
     * TasksController constructor.
     * @param TaskTransformer $transformer
     * @param TaskRepository $repository
     */
    public function __construct(TaskTransformer $transformer, TaskRepository $repository)
    {

        parent::__construct($transformer);
        $this->repository = $repository;


    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {


//        abort(500);
        // No metadata
        // Pagination
        // No error messages
        // Transformations: hem de transformar el que ensenyem



        $this->authorize('show', \App\Task::class);


        $tasks = Task::paginate(15);





        return $this->generatePaginatedResponse($tasks,["propietari" => "Crisitan Fonollà Prats"]);
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
//        $request->input('name');
//        dd($request->all());
        Task::create($request->all());
//        Task::create($request->all());
        return response([
            'error'   => false,
            'created' => (bool) true,
            'message' => 'Task created successfully',
        ], 200);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
//        $task = Task::findOrFail($id);
        $task = $this->repository->find($id);
        return $this->transformer->transform($task);
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        Task::findOrFail($id)->update($request->all());

        $this->authorize('update', $task);

        return response([

            'updated' => true,
            'error'   => false,
            'message' => 'Tasca actualitzada correctament!',

        ], 200);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

        Task::findOrFail($id)->delete();

        return response([
            'error'   => false,
            'deleted' => true,
            'message' => 'Task deleted successfully',
        ], 200);

    }
}