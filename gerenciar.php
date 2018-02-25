<?php

require 'functions.php';
require 'functions/gerenciar_materia_functions.php';


//se foi enviado algum dado do formulario
if(!empty($_POST['opcao'])) {

    $opcao = addslashes($_POST['opcao']);

    $ordem = addslashes($_POST['ordem']);
    $nome = addslashes($_POST['nome']);
    $qtd_pomodoros = addslashes($_POST['qtd_pomodoros']);

    //topicos
    $nome_topico_array = $_POST['nome_topico'];
    $links_array = $_POST['links'];

    switch($opcao) {

        case 1:
            addMateria($ordem, $qtd_pomodoros, $nome);
            header('Location: http://localhost/gerenciador/gerenciar.php');
            break;

        case 2:

            $id_materia = addslashes($_POST['id']);

            editMateria($id_materia, $ordem, $qtd_pomodoros, $nome, $nome_topico_array, $links_array);
            header('Location: http://localhost/gerenciador/gerenciar.php');
            break;

    }
}



$data = array();

if(!empty($_GET['add'])) {

    $data['add'] = true;

} else if(!empty($_GET['edit'])) {

    $data['materia'] = getMateria(addslashes($_GET['edit']));
    $data['topicos'] = getTopicos(addslashes($_GET['edit']));

    if(!empty($data['materia'])) {
        $data['edit'] = true;
    }

} else if(!empty($_GET['delete'])) {
    $id_materia = addslashes($_GET['delete']);
    deleteMateria($id_materia);
    header('Location: http://localhost/gerenciador/gerenciar.php');

} else {

    $data = array('data' => getListaMaterias());

}

loadTemplate('Gerenciar', 'gerenciar', $data);

?>
