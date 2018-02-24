<?php

class Unidade {
    public function save($unidade, $desc_unidade,$user_created, $date_created, $user_edit, $date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO unidade(unidade,desc_unidade,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $unidade, PDO::PARAM_STR);
        $smtp->bindParam(2, $desc_unidade, PDO::PARAM_STR);
        $smtp->bindParam(3, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(4, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(5, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(6, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(7, $status, PDO::PARAM_INT);
        $smtp->bindParam(8, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $unidade, $desc_unidade,$user_created, $date_created, $user_edit, $date_edit,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE unidade SET unidade = ?,desc_unidade = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $unidade, PDO::PARAM_STR);
        $smtp->bindParam(2, $desc_unidade, PDO::PARAM_STR);
        $smtp->bindParam(3, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(4, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(5, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(6, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(7, $status, PDO::PARAM_INT);
        $smtp->bindParam(8, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(9, $id, PDO::PARAM_INT);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $edit = $confirm == TRUE ? TRUE : FALSE;
        return $edit;
    }

    public function inativar($id) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE unidade SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(2, $id, PDO::PARAM_INT);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $edit = $confirm == TRUE ? TRUE : FALSE;
        return $edit;
    }

    public function Dados($id) {
        include_once '../config/database_mysql.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select id,unidade,desc_unidade,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from unidade where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}