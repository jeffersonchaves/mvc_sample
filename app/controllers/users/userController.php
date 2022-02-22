<?php 

require_once __DIR__ . "/../../../vendor/autoload.php"; 

use App\Controllers\Controller;
use App\Entities\User;

/**
 * Call view for register form user 
 * @return void
 */
function register(){
    #primeiro passo: aprsentar o form
    Controller::loadView('users/cadastro.html');
}


function registerUser(){

    if(true){
    
        $user = new User();

        $user->tipo_user = 1;
        $user->nome = "Jefferson";
        $user->cpf = "06895538976";
        $user->senha = "123";
        $user->email = "email@teeste.com";
        $user->descricao = "lorem ipsum dolur";
        $user->data_nascimento = "1989-04-26";
        $user->cadastrar();

        //header('location:index.php?status=success');
        //exit;
    }

    /*
    $data = [
        'titulo'=> "Cadastro de usuario",
        'lista' => ['Luiz', 'Pedro', 'Jefferson']
    ];

    Controller::loadView('index.php',  $data);
    */
}

function editUser() {
    echo "chamou o editar";
}

function listAll(){
    //buscar no banco de dados;
    //validar
    //carregar a view com os dados;

    $data = array();

    $data['users'] = [
        'user1' => ['jefferson', 31],
        'user2' => ['luis', 18],
    ];

    Controller::loadView("users/listar.php", $data);
}

function index(){
    echo "teste";
}

#lembrar de chamar a cada controller
Controller::calluseCase($_GET['action']);