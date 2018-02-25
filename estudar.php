<?php 

require 'functions.php';
require 'functions/materia_functions.php';


$data = getMateriaEstudar();

$materia_atual = $data['id'];

if(!empty($_POST['proxima_materia'])) {
    $proxima = addslashes($_POST['proxima_materia']);
    trocaMateria($proxima, $materia_atual);
}

if(!empty($_POST['pomodoro']) && !empty($_POST['id_materia'])) {
    $id_materia = addslashes($_POST['id_materia']);
    $qtd_pomodoro = addslashes($_POST['pomodoro']);
    setPomodoros($id_materia, $qtd_pomodoro);
}


loadTemplate('Estudar', 'estudar', $data);
