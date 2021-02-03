<?php
namespace App\MVC\Controllers;

use Framework\Controller;
use App\MVC\Models\UserModel;

class HelloController extends Controller
{
    public function index()
    {
        $um = new UserModel();
        $um->create(['name' => 'Duglas']);
        return $this->view('index.php', ['users' => $um->all()]);
        //return $this->view('index.php',['name'=>'Иванов']);
    }

    public function data($user_name, $group_name)
    {        
        return $this->view('data.php', ['name' => $user_name, 'group' => $group_name]);
    }

}