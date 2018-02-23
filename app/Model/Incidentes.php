<?php

class Incidentes {

    public function save($id_salas, $id_alunos, $ocorrido, $quando, $hora, $chamar_pais, $obs, $user_created, $date_created, $user_edit, $date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO incidentes(id_salas,id_alunos,ocorrido,quando,hora,chamar_pais,obs,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_salas, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(3, $ocorrido, PDO::PARAM_STR);
        $smtp->bindParam(4, $quando, PDO::PARAM_STR);
        $smtp->bindParam(5, $hora, PDO::PARAM_STR);
        $smtp->bindParam(6, $chamar_pais, PDO::PARAM_STR);
        $smtp->bindParam(7, $obs, PDO::PARAM_STR);
        $smtp->bindParam(8, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(9, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(10, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(11, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(12, $status, PDO::PARAM_INT);
        $smtp->bindParam(13, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_salas, $id_alunos, $ocorrido, $quando, $hora, $chamar_pais, $obs, $user_created, $date_created, $user_edit, $date_edit, $status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE incidentes SET id_salas = ?,id_alunos = ?,ocorrido = ?,quando = ?,hora = ?,chamar_pais = ?,obs = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_salas, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(3, $ocorrido, PDO::PARAM_STR);
        $smtp->bindParam(4, $quando, PDO::PARAM_STR);
        $smtp->bindParam(5, $hora, PDO::PARAM_STR);
        $smtp->bindParam(6, $chamar_pais, PDO::PARAM_STR);
        $smtp->bindParam(7, $obs, PDO::PARAM_STR);
        $smtp->bindParam(8, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(9, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(10, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(11, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(12, $status, PDO::PARAM_INT);
        $smtp->bindParam(13, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(14, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE incidentes SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_salas,id_alunos,ocorrido,quando,hora,chamar_pais,obs,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from incidentes where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

}
