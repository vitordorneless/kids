<?php

class Chamada {

    public function save($id_salas, $id_alunos, $data_chamada, $dia_semana, $cafe_manha, $lanche_manha, $almoco, $lanche_tarde, $jantar, $presente, $user_created, $date_created, $user_edit, $date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO chamada(id_salas,id_alunos,data_chamada,dia_semana,cafe_manha,lanche_manha,almoco,lanche_tarde,jantar,presente,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_salas, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(3, $data_chamada, PDO::PARAM_STR);
        $smtp->bindParam(4, $dia_semana, PDO::PARAM_STR);
        $smtp->bindParam(5, $cafe_manha, PDO::PARAM_INT);
        $smtp->bindParam(6, $lanche_manha, PDO::PARAM_INT);
        $smtp->bindParam(7, $almoco, PDO::PARAM_INT);
        $smtp->bindParam(8, $lanche_tarde, PDO::PARAM_INT);
        $smtp->bindParam(9, $jantar, PDO::PARAM_INT);
        $smtp->bindParam(10, $presente, PDO::PARAM_INT);
        $smtp->bindParam(11, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(12, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(13, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(14, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(15, $status, PDO::PARAM_INT);
        $smtp->bindParam(16, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_salas, $id_alunos, $data_chamada, $dia_semana, $cafe_manha, $lanche_manha, $almoco, $lanche_tarde, $jantar, $presente, $user_created, $date_created, $user_edit, $date_edit, $status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE chamada SET id_salas = ?,id_alunos = ?,data_chamada = ?,dia_semana = ?,cafe_manha = ?,lanche_manha = ?,almoco = ?,lanche_tarde = ?,jantar = ?,presente = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_salas, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(3, $data_chamada, PDO::PARAM_STR);
        $smtp->bindParam(4, $dia_semana, PDO::PARAM_STR);
        $smtp->bindParam(5, $cafe_manha, PDO::PARAM_INT);
        $smtp->bindParam(6, $lanche_manha, PDO::PARAM_INT);
        $smtp->bindParam(7, $almoco, PDO::PARAM_INT);
        $smtp->bindParam(8, $lanche_tarde, PDO::PARAM_INT);
        $smtp->bindParam(9, $jantar, PDO::PARAM_INT);
        $smtp->bindParam(10, $presente, PDO::PARAM_INT);
        $smtp->bindParam(11, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(12, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(13, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(14, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(15, $status, PDO::PARAM_INT);
        $smtp->bindParam(16, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(17, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE chamada SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_salas,id_alunos,data_chamada,dia_semana,cafe_manha,lanche_manha,almoco,lanche_tarde,jantar,presente,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from chamada where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}