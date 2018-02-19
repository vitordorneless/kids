<?php

class Cardapio {

    public function save($cafe_manha, $lanche_manha, $almoco, $lanche_tarde, $cafe_tarde, $jantar, $lanche_noturno, $dia_cardapio, $faixa_etaria, $id_nutricionista, $user_created, $date_created, $user_edit, $date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO cardapio(cafe_manha,lanche_manha,almoco,lanche_tarde,cafe_tarde,jantar,lanche_noturno,dia_cardapio,faixa_etaria,id_nutricionista,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $cafe_manha, PDO::PARAM_STR);
        $smtp->bindParam(2, $lanche_manha, PDO::PARAM_STR);
        $smtp->bindParam(3, $almoco, PDO::PARAM_STR);
        $smtp->bindParam(4, $lanche_tarde, PDO::PARAM_STR);
        $smtp->bindParam(5, $cafe_tarde, PDO::PARAM_STR);
        $smtp->bindParam(6, $jantar, PDO::PARAM_STR);
        $smtp->bindParam(7, $lanche_noturno, PDO::PARAM_STR);
        $smtp->bindParam(8, $dia_cardapio, PDO::PARAM_STR);
        $smtp->bindParam(9, $faixa_etaria, PDO::PARAM_INT);
        $smtp->bindParam(10, $id_nutricionista, PDO::PARAM_INT);
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

    public function edit($id, $cafe_manha, $lanche_manha, $almoco, $lanche_tarde, $cafe_tarde, $jantar, $lanche_noturno, $dia_cardapio, $faixa_etaria, $id_nutricionista, $user_created, $date_created, $user_edit, $date_edit, $status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE cardapio SET cafe_manha = ?,lanche_manha = ?,almoco = ?,lanche_tarde = ?,cafe_tarde = ?,jantar = ?,lanche_noturno = ?,dia_cardapio = ?,faixa_etaria = ?,id_nutricionista = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $cafe_manha, PDO::PARAM_STR);
        $smtp->bindParam(2, $lanche_manha, PDO::PARAM_STR);
        $smtp->bindParam(3, $almoco, PDO::PARAM_STR);
        $smtp->bindParam(4, $lanche_tarde, PDO::PARAM_STR);
        $smtp->bindParam(5, $cafe_tarde, PDO::PARAM_STR);
        $smtp->bindParam(6, $jantar, PDO::PARAM_STR);
        $smtp->bindParam(7, $lanche_noturno, PDO::PARAM_STR);
        $smtp->bindParam(8, $dia_cardapio, PDO::PARAM_STR);
        $smtp->bindParam(9, $faixa_etaria, PDO::PARAM_INT);
        $smtp->bindParam(10, $id_nutricionista, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE cardapio SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,cafe_manha,lanche_manha,almoco,lanche_tarde,cafe_tarde,jantar,lanche_noturno,dia_cardapio,faixa_etaria,id_nutricionista,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from cardapio where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

}