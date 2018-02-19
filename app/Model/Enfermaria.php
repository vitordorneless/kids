<?php

class Enfermaria {
    public function save($id_alunos,$prescricao,$continuo,$validade_receita,$periodo1,$periodo2,$intervalo_medicamento,$local_receita,$obs,$user_created,$date_created,$user_edit,$date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO enfermaria(id_alunos,prescricao,continuo,validade_receita,periodo1,periodo2,intervalo_medicamento,local_receita,obs,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(2, $prescricao, PDO::PARAM_STR);
        $smtp->bindParam(3, $continuo, PDO::PARAM_INT);
        $smtp->bindParam(4, $validade_receita, PDO::PARAM_STR);
        $smtp->bindParam(5, $periodo1, PDO::PARAM_STR);
        $smtp->bindParam(6, $periodo2, PDO::PARAM_STR);
        $smtp->bindParam(7, $intervalo_medicamento, PDO::PARAM_STR);
        $smtp->bindParam(8, $local_receita, PDO::PARAM_STR);
        $smtp->bindParam(9, $obs, PDO::PARAM_STR);
        $smtp->bindParam(10, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(11, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(12, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(13, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(14, $status, PDO::PARAM_INT);
        $smtp->bindParam(15, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_alunos,$prescricao,$continuo,$validade_receita,$periodo1,$periodo2,$intervalo_medicamento,$local_receita,$obs,$user_created,$date_created,$user_edit,$date_edit,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE enfermaria SET id_alunos = ?,prescricao = ?,continuo = ?,validade_receita = ?,periodo1 = ?,periodo2 = ?,intervalo_medicamento = ?,local_receita = ?,obs = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(2, $prescricao, PDO::PARAM_STR);
        $smtp->bindParam(3, $continuo, PDO::PARAM_INT);
        $smtp->bindParam(4, $validade_receita, PDO::PARAM_STR);
        $smtp->bindParam(5, $periodo1, PDO::PARAM_STR);
        $smtp->bindParam(6, $periodo2, PDO::PARAM_STR);
        $smtp->bindParam(7, $intervalo_medicamento, PDO::PARAM_STR);
        $smtp->bindParam(8, $local_receita, PDO::PARAM_STR);
        $smtp->bindParam(9, $obs, PDO::PARAM_STR);
        $smtp->bindParam(10, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(11, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(12, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(13, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(14, $status, PDO::PARAM_INT);
        $smtp->bindParam(15, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(16, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE enfermaria SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_alunos,prescricao,continuo,validade_receita,periodo1,periodo2,intervalo_medicamento,local_receita,obs,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from enfermaria where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
