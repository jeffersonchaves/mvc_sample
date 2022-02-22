<?php

namespace App\Entities;

use App\Connection\Connection;
use PDO;

class User {

    Public $id;
    Public $tipo_user;
    Public $nome;
    Public $cpf;
    Public $senha;
    Public $email;
    Public $descricao;
    Public $data_nascimento;

    public function cadastrar(){
        $dataBase = new Connection('tb_users');
        $this->id = $dataBase->insert([
            'tipo_user' => $this->tipo_user,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'email' => $this->email,
            'descricao' => $this->descricao,
            'data_nascimento' => $this->data_nascimento
        ]);
        return true;
    }

    public function atualizar(){
        return (new Connection('usuarios'))->update($this->id,[
            'tipo_user' => $this->tipo_user,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'email' => $this->email,
            'descricao' => $this->descricao,
            'data_nascimento' => $this->data_nascimento]);

    }

    public function excluir(){
        return (new Connection('usuarios'))->delete($this->id);
    }

    public static function getUsers($where = null, $order = null, $limit=null){
        return (new Connection('usuarios'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getUser($id){
        return (new Connection('usuarios'))->selectOne('id = '.$id)
                                        ->fetchObject(self::class);
    }

    public static function getLogin($email,$senha){
        return (new Connection('usuarios'))->selectLogin($email,$senha)
                                        ->fetchObject(self::class);
    }

}