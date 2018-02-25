<?php

class Magica {

    private $login;
    private $pass;
    private $id_setor;
    private $nome;
    private $foto;
    private $email;
    private $admin;
    private $status;
    private $user_created;
    private $date_created;
    private $user_edit;
    private $date_edit;
    private $data_ultima_alteracao;

    public function __get($valor) {
        return $this->$valor;
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

}
