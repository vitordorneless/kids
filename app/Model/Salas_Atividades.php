<?php

class Salas_Atividades extends Magica {
    public function save($id_salas,$id_atividades,$horario,$data,$user_created,$date_created,$user_edit,$date_edit,$atividade_realizada) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO salas_atividades(id_salas,id_atividades,horario,data,user_created,date_created,user_edit,date_edit,atividade_realizada,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_salas, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_atividades, PDO::PARAM_INT);
        $smtp->bindParam(3, $horario, PDO::PARAM_STR);        
        $smtp->bindParam(4, $data, PDO::PARAM_STR);                
        $smtp->bindParam(5, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(6, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(7, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(8, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(9, $atividade_realizada, PDO::PARAM_INT);
        $smtp->bindParam(10, $status, PDO::PARAM_INT);
        $smtp->bindParam(11, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_salas,$id_atividades,$horario,$data,$user_created,$date_created,$user_edit,$date_edit,$atividade_realizada,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE salas_atividades SET id_salas = ?,id_atividades = ?,horario = ?,data = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,atividade_realizada = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_salas, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_atividades, PDO::PARAM_INT);
        $smtp->bindParam(3, $horario, PDO::PARAM_STR);        
        $smtp->bindParam(4, $data, PDO::PARAM_STR);                
        $smtp->bindParam(5, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(6, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(7, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(8, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(9, $atividade_realizada, PDO::PARAM_INT);
        $smtp->bindParam(10, $status, PDO::PARAM_INT);
        $smtp->bindParam(11, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(12, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE salas_atividades SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_salas,id_atividades,horario,data,user_created,date_created,user_edit,date_edit,atividade_realizada,status,data_ultima_alteracao from salas_atividades where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
