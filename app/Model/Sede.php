<?php

class Sede extends Magica {
    public function save($nome,$cnpj,$endereco,$numero,$complemento,$cep,$bairro,$cidade,$estado,$tel1,
            $tel2,$email1,$email2,$site,$principal,$user_created,$date_created,$user_edit,$date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO sede(nome,cnpj,endereco,numero,complemento,cep,bairro,cidade,estado,tel1,tel2,email1,email2,site,principal,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $nome, PDO::PARAM_INT);
        $smtp->bindParam(2, $cnpj, PDO::PARAM_INT);
        $smtp->bindParam(3, $endereco, PDO::PARAM_INT);
        $smtp->bindParam(4, $numero, PDO::PARAM_INT);
        $smtp->bindParam(5, $complemento, PDO::PARAM_INT);
        $smtp->bindParam(6, $cep, PDO::PARAM_INT);
        $smtp->bindParam(7, $bairro, PDO::PARAM_INT);
        $smtp->bindParam(8, $cidade, PDO::PARAM_INT);
        $smtp->bindParam(9, $estado, PDO::PARAM_INT);
        $smtp->bindParam(10, $tel1, PDO::PARAM_INT);        
        $smtp->bindParam(11, $tel2, PDO::PARAM_INT);        
        $smtp->bindParam(12, $email1, PDO::PARAM_INT);        
        $smtp->bindParam(13, $email2, PDO::PARAM_INT);        
        $smtp->bindParam(14, $site, PDO::PARAM_INT);        
        $smtp->bindParam(15, $principal, PDO::PARAM_INT);        
        $smtp->bindParam(16, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(17, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(18, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(19, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(20, $status, PDO::PARAM_INT);
        $smtp->bindParam(21, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_salas,$id_alunos,$id_semestre,$user_created,$date_created,$user_edit,$date_edit,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE sede SET nome = ?,cnpj = ?,endereco = ?,numero = ?,complemento = ?,cep = ?,bairro = ?,cidade = ?,estado = ?,tel1 = ?,tel2 = ?,email1 = ?,email2 = ?,site = ?,principal = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit,status,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $nome, PDO::PARAM_INT);
        $smtp->bindParam(2, $cnpj, PDO::PARAM_INT);
        $smtp->bindParam(3, $endereco, PDO::PARAM_INT);
        $smtp->bindParam(4, $numero, PDO::PARAM_INT);
        $smtp->bindParam(5, $complemento, PDO::PARAM_INT);
        $smtp->bindParam(6, $cep, PDO::PARAM_INT);
        $smtp->bindParam(7, $bairro, PDO::PARAM_INT);
        $smtp->bindParam(8, $cidade, PDO::PARAM_INT);
        $smtp->bindParam(9, $estado, PDO::PARAM_INT);
        $smtp->bindParam(10, $tel1, PDO::PARAM_INT);        
        $smtp->bindParam(11, $tel2, PDO::PARAM_INT);        
        $smtp->bindParam(12, $email1, PDO::PARAM_INT);        
        $smtp->bindParam(13, $email2, PDO::PARAM_INT);        
        $smtp->bindParam(14, $site, PDO::PARAM_INT);        
        $smtp->bindParam(15, $principal, PDO::PARAM_INT);        
        $smtp->bindParam(16, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(17, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(18, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(19, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(20, $status, PDO::PARAM_INT);
        $smtp->bindParam(21, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(22, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE sede SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,nome,cnpj,endereco,numero,complemento,cep,bairro,cidade,estado,tel1,tel2,email1,email2,site,principal,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from sede where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
