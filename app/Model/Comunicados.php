<?php

class Comunicados extends Magica {
    public function save($id_sala,$comunicado,$autorizacao_pais,$user_created,$date_created,$user_edit,$date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO comunicado(id_sala,comunicado,autorizacao_pais,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_sala, PDO::PARAM_INT);
        $smtp->bindParam(2, $comunicado, PDO::PARAM_STR);
        $smtp->bindParam(3, $autorizacao_pais, PDO::PARAM_INT);
        $smtp->bindParam(4, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(5, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(6, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(7, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(8, $status, PDO::PARAM_INT);
        $smtp->bindParam(9, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_sala,$comunicado,$autorizacao_pais,$user_created,$date_created,$user_edit,$date_edit,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE comunicado SET id_sala = ?,comunicado = ?,autorizacao_pais = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_sala, PDO::PARAM_INT);
        $smtp->bindParam(2, $comunicado, PDO::PARAM_STR);
        $smtp->bindParam(3, $autorizacao_pais, PDO::PARAM_INT);
        $smtp->bindParam(4, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(5, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(6, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(7, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(8, $status, PDO::PARAM_INT);
        $smtp->bindParam(9, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(10, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE comunicado SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_sala,comunicado,autorizacao_pais,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from comunicado where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
