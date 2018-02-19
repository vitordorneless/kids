<?php

class Alunos {
    public function save($nome,$cpf,$nome_mae,$cpf_mae,$tel_mae,$email_mae,$nome_pai,$cpf_pai,$tel_pai,$email_pai,$enviar_email,$contato,$tel_contato,$obs,$nascimento,$id_alergia,$peso,$data_peso,$altura,$data_altura,$deficiente,$data_criacao,$user_created,$date_created,$user_edit,$date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO alunos(nome,cpf,nome_mae,cpf_mae,tel_mae,email_mae,nome_pai,cpf_pai,tel_pai,email_pai,enviar_email,contato,tel_contato,obs,nascimento,id_alergia,peso,data_peso,altura,data_altura,deficiente,data_criacao,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $nome, PDO::PARAM_STR);
        $smtp->bindParam(2, $cpf, PDO::PARAM_STR);
        $smtp->bindParam(3, $nome_mae, PDO::PARAM_STR);
        $smtp->bindParam(4, $cpf_mae, PDO::PARAM_STR);
        $smtp->bindParam(5, $tel_mae, PDO::PARAM_STR);
        $smtp->bindParam(6, $email_mae, PDO::PARAM_STR);
        $smtp->bindParam(7, $nome_pai, PDO::PARAM_STR);
        $smtp->bindParam(8, $cpf_pai, PDO::PARAM_STR);
        $smtp->bindParam(9, $tel_pai, PDO::PARAM_STR);
        $smtp->bindParam(10, $email_pai, PDO::PARAM_STR);
        $smtp->bindParam(11, $enviar_email, PDO::PARAM_INT);
        $smtp->bindParam(12, $contato, PDO::PARAM_STR);
        $smtp->bindParam(13, $tel_contato, PDO::PARAM_STR);
        $smtp->bindParam(14, $obs, PDO::PARAM_STR);
        $smtp->bindParam(15, $nascimento, PDO::PARAM_STR);
        $smtp->bindParam(16, $id_alergia, PDO::PARAM_INT);
        $smtp->bindParam(17, $peso, PDO::PARAM_STR);
        $smtp->bindParam(18, $data_peso, PDO::PARAM_STR);
        $smtp->bindParam(19, $altura, PDO::PARAM_STR);
        $smtp->bindParam(20, $data_altura, PDO::PARAM_STR);
        $smtp->bindParam(21, $deficiente, PDO::PARAM_INT);
        $smtp->bindParam(22, $data_criacao, PDO::PARAM_STR);
        $smtp->bindParam(23, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(24, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(25, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(26, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(27, $status, PDO::PARAM_INT);
        $smtp->bindParam(28, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $nome,$cpf,$nome_mae,$cpf_mae,$tel_mae,$email_mae,$nome_pai,$cpf_pai,$tel_pai,$email_pai,$enviar_email,$contato,$tel_contato,$obs,$nascimento,$id_alergia,$peso,$data_peso,$altura,$data_altura,$deficiente,$data_criacao,$user_created,$date_created,$user_edit,$date_edit,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE alunos SET nome = ?,cpf = ?,nome_mae = ?,cpf_mae = ?,tel_mae = ?,email_mae = ?,nome_pai = ?,cpf_pai = ?,tel_pai = ?,email_pai = ?,enviar_email = ?,contato = ?,tel_contato = ?,obs = ?,nascimento = ?,id_alergia = ?,peso = ?,data_peso = ?,altura = ?,data_altura = ?,deficiente = ?,data_criacao = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $nome, PDO::PARAM_STR);
        $smtp->bindParam(2, $cpf, PDO::PARAM_STR);
        $smtp->bindParam(3, $nome_mae, PDO::PARAM_STR);
        $smtp->bindParam(4, $cpf_mae, PDO::PARAM_STR);
        $smtp->bindParam(5, $tel_mae, PDO::PARAM_STR);
        $smtp->bindParam(6, $email_mae, PDO::PARAM_STR);
        $smtp->bindParam(7, $nome_pai, PDO::PARAM_STR);
        $smtp->bindParam(8, $cpf_pai, PDO::PARAM_STR);
        $smtp->bindParam(9, $tel_pai, PDO::PARAM_STR);
        $smtp->bindParam(10, $email_pai, PDO::PARAM_STR);
        $smtp->bindParam(11, $enviar_email, PDO::PARAM_INT);
        $smtp->bindParam(12, $contato, PDO::PARAM_STR);
        $smtp->bindParam(13, $tel_contato, PDO::PARAM_STR);
        $smtp->bindParam(14, $obs, PDO::PARAM_STR);
        $smtp->bindParam(15, $nascimento, PDO::PARAM_STR);
        $smtp->bindParam(16, $id_alergia, PDO::PARAM_INT);
        $smtp->bindParam(17, $peso, PDO::PARAM_STR);
        $smtp->bindParam(18, $data_peso, PDO::PARAM_STR);
        $smtp->bindParam(19, $altura, PDO::PARAM_STR);
        $smtp->bindParam(20, $data_altura, PDO::PARAM_STR);
        $smtp->bindParam(21, $deficiente, PDO::PARAM_INT);
        $smtp->bindParam(22, $data_criacao, PDO::PARAM_STR);
        $smtp->bindParam(23, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(24, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(25, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(26, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(27, $status, PDO::PARAM_INT);
        $smtp->bindParam(28, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(29, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE alunos SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,nome,cpf,nome_mae,cpf_mae,tel_mae,email_mae,nome_pai,cpf_pai,tel_pai,email_pai,enviar_email,contato,tel_contato,obs,nascimento,id_alergia,peso,data_peso,altura,data_altura,deficiente,data_criacao,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from alunos where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
