<?php

class Log {
    public function save($descricao,$id_operacao,$user,$hora,$dia) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO log(descricao,id_operacao,user,hora,dia,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $descricao, PDO::PARAM_STR);
        $smtp->bindParam(2, $id_operacao, PDO::PARAM_INT);
        $smtp->bindParam(3, $user, PDO::PARAM_STR);
        $smtp->bindParam(4, $hora, PDO::PARAM_INT);
        $smtp->bindParam(5, $dia, PDO::PARAM_STR);
        $smtp->bindParam(6, $status, PDO::PARAM_INT);
        $smtp->bindParam(7, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function Dados($id) {
        include_once '../config/database_mysql.php';
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select id,descricao,id_operacao,user,hora,dia,status,data_ultima_alteracao from log where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
