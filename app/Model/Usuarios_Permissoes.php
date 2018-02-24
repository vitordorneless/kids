<?php

class Usuarios_Permissoes {
    public function save($id_usuario,$super_admin,$admin,$aulas,$user_created,$date_created,$user_edit,$date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO usuarios_permissoes(id_usuario,super_admin,admin,aulas,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_usuario, PDO::PARAM_INT);
        $smtp->bindParam(2, $super_admin, PDO::PARAM_INT);
        $smtp->bindParam(3, $admin, PDO::PARAM_INT);
        $smtp->bindParam(4, $aulas, PDO::PARAM_INT);                
        $smtp->bindParam(5, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(6, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(7, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(8, $date_edit, PDO::PARAM_INT);
        $smtp->bindParam(9, $status, PDO::PARAM_INT);
        $smtp->bindParam(10, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }    

    public function edit($id, $id_usuario,$super_admin,$admin,$aulas,$user_created,$date_created,$user_edit,$date_edit, $status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE usuarios_permissoes SET id_usuario = ?,super_admin = ?,admin = ?,aulas = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_usuario, PDO::PARAM_INT);
        $smtp->bindParam(2, $super_admin, PDO::PARAM_INT);
        $smtp->bindParam(3, $admin, PDO::PARAM_INT);
        $smtp->bindParam(4, $aulas, PDO::PARAM_INT);                
        $smtp->bindParam(5, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(6, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(7, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(8, $date_edit, PDO::PARAM_INT);
        $smtp->bindParam(9, $status, PDO::PARAM_INT);
        $smtp->bindParam(10, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(11, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE usuarios_permissoes SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_usuario,super_admin,admin,aulas,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from usuarios_permissoes where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
