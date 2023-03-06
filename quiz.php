<?php
    session_start();

    $mostrar_puntos = false;

    include('preguntas.php');

    $index = rand(0, count($preguntas) - 1);

    $pregunta = $preguntas[$index];

    $respuestas   = [];
    $respuestas[] = $pregunta['respuesta_correcta'];
    $respuestas[] = $pregunta['pregunta_trampa1'];
    $respuestas[] = $pregunta['pregunta_trampa2'];

    shuffle($respuestas);

    $preparando_respuesta = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['respuesta'])) {

        if ($_POST['respuesta'] == $preguntas[$_POST['index']]['respuesta_correcta']) {

            $preparando_respuesta = "¡Respuesta correcta! ¡Eres un genio!.";

            if (isset($_SESSION['totcorrectas'])) {

                $_SESSION['totcorrectas']++;

            }

        } else {

            $preparando_respuesta = "¡Respuesta incorrecta!.";

        }

    }
    }

    $totpreguntas = count($preguntas);

    if (!isset($_SESSION['preguntas_index'])) 
    {
    $_SESSION['preguntas_index'] = [];
    $_SESSION['totcorrectas'] = 0;
    }

    if (count($_SESSION['preguntas_index']) == $totpreguntas) 
    {
    $_SESSION['preguntas_index'] = [];
    $mostrar_puntos = true;
    } 
    else 
    {
    $mostrar_puntos = false;

    if (count($_SESSION['preguntas_index']) == 0) 
    {
        $_SESSION['totcorrectas'] = 0;
        $preparando_respuesta = '';
    }
    do 
    {
        $index = rand(0, count($preguntas) - 1);
    } 
    while (in_array($index, $_SESSION['preguntas_index']));

    $pregunta = $preguntas[$index];
    array_push($_SESSION['preguntas_index'], $index);

    $respuestas   = [];
    $respuestas[] = $pregunta['respuesta_correcta'];
    $respuestas[] = $pregunta['pregunta_trampa1'];
    $respuestas[] = $pregunta['pregunta_trampa2'];
    shuffle($respuestas);
    }
?>