<?php

class Alunos_Valores {
    public function save($id_alunos,$id_valores,$desconto,$acrescimo,$multa,$valor_total,$competencia,$ano,$comp_ano,$pago,$recibo,$dia_vencimento,$user_created,$date_created,$user_edit,$date_edit) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $status = 1;
        $pdo = Database::connect();
        $smtp = $pdo->prepare("INSERT INTO alunos_valores(id_alunos,id_valores,desconto,acrescimo,multa,valor_total,competencia,ano,comp_ano,pago,recibo,dia_vencimento,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $smtp->bindParam(1, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_valores, PDO::PARAM_INT);
        $smtp->bindParam(3, $desconto, PDO::PARAM_STR);
        $smtp->bindParam(4, $acrescimo, PDO::PARAM_STR);
        $smtp->bindParam(5, $multa, PDO::PARAM_STR);
        $smtp->bindParam(6, $valor_total, PDO::PARAM_STR);
        $smtp->bindParam(7, $competencia, PDO::PARAM_STR);
        $smtp->bindParam(8, $ano, PDO::PARAM_STR);
        $smtp->bindParam(9, $comp_ano, PDO::PARAM_STR);
        $smtp->bindParam(10, $pago, PDO::PARAM_INT);
        $smtp->bindParam(11, $recibo, PDO::PARAM_STR);
        $smtp->bindParam(12, $dia_vencimento, PDO::PARAM_STR);        
        $smtp->bindParam(13, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(14, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(15, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(16, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(17, $status, PDO::PARAM_INT);
        $smtp->bindParam(18, $data_ultima_alteracao, PDO::PARAM_STR);
        $confirm = $smtp->execute();
        //print_r($smtp->errorInfo());
        Database::disconnect();
        $save = $confirm == TRUE ? TRUE : FALSE;
        return $save;
    }

    public function edit($id, $id_alunos,$id_valores,$desconto,$acrescimo,$multa,$valor_total,$competencia,$ano,$comp_ano,$pago,$recibo,$dia_vencimento,$user_created,$date_created,$user_edit,$date_edit,$status) {
        include_once '../config/database_mysql.php';
        $data_ultima_alteracao = date('Y-m-d H:i:s');
        $pdo = Database::connect();
        $smtp = $pdo->prepare("UPDATE alunos_valores SET id_alunos = ?,id_valores = ?,desconto = ?,acrescimo = ?,multa = ?,valor_total = ?,competencia = ?,ano = ?,comp_ano = ?,pago = ?,recibo = ?,dia_vencimento = ?,user_created = ?,date_created = ?,user_edit = ?,date_edit = ?,status = ?,data_ultima_alteracao = ? WHERE id = ?");
        $smtp->bindParam(1, $id_alunos, PDO::PARAM_INT);
        $smtp->bindParam(2, $id_valores, PDO::PARAM_INT);
        $smtp->bindParam(3, $desconto, PDO::PARAM_STR);
        $smtp->bindParam(4, $acrescimo, PDO::PARAM_STR);
        $smtp->bindParam(5, $multa, PDO::PARAM_STR);
        $smtp->bindParam(6, $valor_total, PDO::PARAM_STR);
        $smtp->bindParam(7, $competencia, PDO::PARAM_STR);
        $smtp->bindParam(8, $ano, PDO::PARAM_STR);
        $smtp->bindParam(9, $comp_ano, PDO::PARAM_STR);
        $smtp->bindParam(10, $pago, PDO::PARAM_INT);
        $smtp->bindParam(11, $recibo, PDO::PARAM_STR);
        $smtp->bindParam(12, $dia_vencimento, PDO::PARAM_STR);        
        $smtp->bindParam(13, $user_created, PDO::PARAM_INT);
        $smtp->bindParam(14, $date_created, PDO::PARAM_STR);
        $smtp->bindParam(15, $user_edit, PDO::PARAM_INT);
        $smtp->bindParam(16, $date_edit, PDO::PARAM_STR);
        $smtp->bindParam(17, $status, PDO::PARAM_INT);
        $smtp->bindParam(18, $data_ultima_alteracao, PDO::PARAM_STR);
        $smtp->bindParam(19, $id, PDO::PARAM_INT);
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
        $smtp = $pdo->prepare("UPDATE alunos_valores SET status = 0,data_ultima_alteracao = ? WHERE id = ?");
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
        $sql = "select id,id_alunos,id_valores,desconto,acrescimo,multa,valor_total,competencia,ano,comp_ano,pago,recibo,dia_vencimento,user_created,date_created,user_edit,date_edit,status,data_ultima_alteracao from alunos_valores where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
