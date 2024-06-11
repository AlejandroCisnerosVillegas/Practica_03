<?php include('quiz.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Sistema Interactivo de Evaluación Matemática</title>
        <link rel="stylesheet" href="style.css">
        <link href="../../assets/img/logo.png" rel="icon">
        <link href="../../assets/img/logo-grande.png" rel="apple-touch-icon">
    </head>
    <body>
        <div class="container">
            <?php if ($mostrar_puntos == false): ?>
                <h1 class="quiz-title">Quiz de Matemáticas</h1>
                <h2 class="quiz-question">¿Cuánto es <?php echo $pregunta['num_izquierda'].' '.$pregunta['signo_opc'].' '.$pregunta['num_derecha']; ?>?</h2>
                <p class="quiz-progress">Pregunta <?php echo count($_SESSION['preguntas_index']); ?> de <?php echo $totpreguntas; ?></p>
                <form action="index.php" method="POST" class="quiz-form">
                    <input type="hidden" name="index" value="<?php echo $index ?>" />
                    <div class="quiz-buttons">
                        <button class="quiz-button" name="respuesta" value="<?php echo $respuestas[0]; ?>"><?php echo $respuestas[0]; ?></button>
                        <button class="quiz-button" name="respuesta" value="<?php echo $respuestas[1]; ?>"><?php echo $respuestas[1]; ?></button>
                        <button class="quiz-button" name="respuesta" value="<?php echo $respuestas[2]; ?>"><?php echo $respuestas[2]; ?></button>
                    </div>
                </form>
                <p class="quiz-response"><?php echo $preparando_respuesta; ?></p>
            <?php else: ?>
                <h2 class="quiz-score">Respuestas correctas: <?php echo $_SESSION['totcorrectas']; ?> de <?php echo $totpreguntas; ?> preguntas</h2>
                <form action="index.php" method="POST" class="quiz-form">
                    <button class="quiz-button">Intentar de nuevo</button>
                </form>
            <?php endif; ?>
            <img src="../../assets/img/logo-grande.png" alt="Logo" class="quiz-logo">
        </div>
    </body>
</html>