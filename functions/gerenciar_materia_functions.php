<?php

//require 'config.php';

//pega lista de materias 
function getListaMaterias() {

    $data = array();

    global $pdo;

    $sql = "SELECT * FROM materias ORDER BY ordem";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    return $data;

}

//pega dados da materia por id
function getMateria($id_materia) {

    $data = array();

    global $pdo;

    $sql = "SELECT * FROM materias WHERE id = :id_materia";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id_materia', $id_materia);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetch();
    }

    return $data;

}


//adiciona materia
function addMateria($ordem, $qtd_pomodoros, $nome) {
    $data = array();
    global $pdo;

    verificaOrdem($ordem);

    $sql = "INSERT INTO materias SET nome = :nome, ordem = :ordem, qtd_pomodoros = :qtd_pomodoros";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':ordem', $ordem);
    $sql->bindValue(':qtd_pomodoros', $qtd_pomodoros);
    $sql->execute();

}

//edita materia
function editMateria($id_materia, $ordem, $qtd_pomodoros, $nome, $nome_topico_array, $links_array) {

    global $pdo;
    verificaOrdem($ordem);

    $sql = "UPDATE materias SET nome = :nome, ordem = :ordem, qtd_pomodoros = :qtd_pomodoros WHERE id = :id_materia";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':ordem', $ordem);
    $sql->bindValue(':qtd_pomodoros', $qtd_pomodoros);
    $sql->bindValue(':id_materia', $id_materia);
    $sql->execute();
    
    //add topicos
    if(!empty($nome_topico_array)) {

        //verifica se tem topicos
        $sql = "SELECT * FROM topicos WHERE id_materia = :id_materia";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id_materia', $id_materia);
        $sql->execute();

        //se tiver topicos remove tudo para por os novos
        if($sql->rowCount() > 0) {

            $sql = "DELETE FROM topicos WHERE id_materia = :id_materia";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id_materia', $id_materia);
            $sql->execute();

        }

        //add topicos
        //prepara query
        
        //string com os dados a serem inseridos
        $data_passed = "";

        $sql = "INSERT INTO topicos (id_materia, nome, links) VALUES ";
        for($i = 0; $i<count($nome_topico_array); $i++) {
            $sql.= "(?, ?, ?), ";
            //coloca dados na string
            //trocando separador para ###, para nao dar erro no explode
            $data_passed.=$id_materia.'###';
            $data_passed.=$nome_topico_array[$i].'###';
            $data_passed.= $links_array[$i].'###';
        }

        //remove ultimas virgulas
        $sql = rtrim($sql, ', ');

        //dados da query
        $data_passed = rtrim($data_passed, '###');
        $array_dados = explode('###',$data_passed);
        //executa query com os dados
        $sql = $pdo->prepare($sql);
        $sql->execute($array_dados);

    }


}

//exclui materia
function deleteMateria($id_materia) {
    global $pdo;

    $sql = "DELETE FROM materias WHERE id = :id_materia";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id_materia', $id_materia);
    $sql->execute();

}


//pega topicos da materia
function getTopicos($id_materia) {
    $data = array();

    global $pdo;

    $sql = "SELECT * FROM topicos WHERE id_materia = :id_materia";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id_materia', $id_materia);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    return $data;
}
//adiciona topico na materia
function addTopico($id_materia, $nome, $links_json) {

}

//edita topico
function editTopico($id_topico, $nome, $links_json) {

}

//remove topico
function deleteTopico($id_topico) {

}

function verificaOrdem($ordem) {
    global $pdo;
    $data = array();

    //verifica se existe materia com a ordem definida
    $sql = "SELECT id, (select COUNT(*) from materias) as new_ordem FROM materias WHERE ordem = :ordem";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':ordem', $ordem);
    $sql->execute();

    //se existir materia com aquela ordem
    if($sql->rowCount() > 0) {
        $data = $sql->fetch();

        $sql = "UPDATE materias SET ordem = :ordem WHERE id = :id_materia";
        $sql = $pdo->prepare($sql);
        //nova ordem = ultimo = qtd de materias
        $sql->bindValue(':ordem', $data['new_ordem']);
        $sql->bindValue(':id_materia', $data['id']);
        $sql->execute();

        //atualiza materia com aquela ordem
        return true;

    }
}

