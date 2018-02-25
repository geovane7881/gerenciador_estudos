<?php

require 'config.php';

//pega materia para estudar agora (status = 1)
//pega qtd_pomodoro, titulo, topicos, id
function getMateriaEstudar() {
    $array = array();
    global $pdo;

    $sql = "SELECT * FROM materias WHERE status = 1";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetch(PDO::FETCH_ASSOC);

        $id = $array['id'];

        $sql = "SELECT nome as topico, topicos.links FROM  topicos 
            WHERE id_materia = :id";

        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array['topicos'] = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

            
    }

    //retorna topicos
    return $array;
}



//coloca pomodoros estudados
//seta pomodoros_estudados no bd
function setPomodoros($id_materia, $qtd_pomodoros) {
    global $pdo;

    $sql = "UPDATE materias SET pomodoros_estudados = :qtd_pomodoros WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id', $id_materia);
    $sql->bindValue(':qtd_pomodoros', $qtd_pomodoros);
    $sql->execute();

}


//proxima = 1 ou -1
function trocaMateria($proxima, $materia_atual) {

    global $pdo;

    //pega ordem da materia atual e o total de materias (começa com 0)
    $sql = "SELECT ordem, (select count(*) from materias ) as numero_de_materias from materias where id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id', $materia_atual);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $dados = $sql->fetch();
        $ordem = $dados['ordem'];
        $num_materias = $dados['numero_de_materias'];

        //marca o status da materia atual como 0
        $sql = "UPDATE materias SET status = 0, pomodoros_estudados = 0 WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id', $materia_atual);
        $sql->execute();


        //calcula ordem da proxima (+1 ou -1)
        $ordem = $ordem+$proxima;
        //se for a ultima volta para o começo
        if($ordem == $num_materias) {
            $ordem = 0;
        //se for menor que 0 subtrai 1 do numero total de materias = volta para penultima
        } else if($ordem < 0) {
            $ordem = $num_materias+$proxima;
            //ex: ordem 0, quero voltar 
        }


        //marca o status da proxima como 1, 
        $sql = "UPDATE materias SET status = 1 WHERE ordem = :ordem";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':ordem', $ordem);
        $sql->execute();


    }

}
