<?php 

namespace App\Controllers;

use BadFunctionCallException;
use InvalidArgumentException;

class Controller {

    public static function calluseCase(string $funtionName){
        
        if (function_exists($funtionName)) {
            call_user_func($funtionName);
        } else {
            throw new BadFunctionCallException("Usecase not exists");
        }
    }

    public static function loadView(string $viewPath, $data = null){

        $default_path = __DIR__ . "/../../views/";

        if (file_exists($default_path . $viewPath)) {
        
            require_once $default_path . $viewPath;
        } else {
            throw new InvalidArgumentException("tela nao existe");
        }
    }
}