<?php
namespace App\MVC\Controllers;

use App\MVC\Models\TodosModel;
use Framework\Controller;
use App\MVC\Models\UserModel;

class TodosController extends Controller
{
    public function index()
    {
        $um = new TodosModel();
        return $this->view('index_todos.php', ['todos' => $um->all()]);
        //return $this->view('index.php',['name'=>'Иванов']);
    }
}