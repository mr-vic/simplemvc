<?php
namespace App\MVC\Controllers;

use Framework\Controller;

class HelloController extends Controller
{
    public function index() {
        return $this->view('index.php', ['name' => 'Иванов']);
    }

    public function data(){
        return $this->view('data.php', ['name' => 'Иванов', 'group' => '605-71']);
    }
}