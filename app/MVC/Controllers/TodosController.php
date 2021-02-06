<?php
namespace App\MVC\Controllers;

use App\MVC\Models\TodosModel;
use Framework\Controller;
use App\MVC\Models\UserModel;

class TodosController extends Controller
{
    private $tm;

    public function __construct()
    {
        $this->tm = new TodosModel();
    }

    public function index($request)
    {
        // $this->tm->updateById(1, ["task" => "Hello world", "complete" => 0]);
        return $this->view('index_todos.php', ['todos' => $this->tm->all()]);
    }

    public function store($request)
    {
        $this->tm->create(['task' => $request->getPostParams()["task"]]);
        header("Location: /todos");
    }

    public function remove($request, $task_id)
    {
        $this->tm->deleteById($task_id);
        header("Location: /todos");
    }


    public function complete($request, $task_id)
    {
        $this->tm->updateById($task_id, ['complete' => !$this->tm->getById($task_id)->complete]);
        header("Location: /todos");
    }
}