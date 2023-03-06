<?php include('quiz.php'); ?>

<html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="../../assets/img/Favicon-img.png">
		<title>Practica 03</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="cajaquiz" align="center">
        <?php

          if ($mostrar_puntos == false) 
		  {
             ?>
			 <h1><p class="quiztitulo">Quiz de matemáticas</p></h1>
        <h1>
		<p class="quiz">¿Cuánto es 	
		<?php echo $pregunta['num_izquierda'].' '.$pregunta['signo_opc'].' '.$pregunta['num_derecha']; ?>?
		</p></h1>
		<h1>
				<p>Pregunta <?php echo count($_SESSION['preguntas_index']); ?> de 
							<?php echo $totpreguntas; ?>
		</p></h1>
				
        <form action="index.php" method="POST">
            <input type="hidden" name="index" value="<?php echo $index ?>" />
			<br>
            <input type="submit" class="botonesvai" name="respuesta" value="<?php echo $respuestas[0]; ?>" />
            <input type="submit" class="botonesvai" name="respuesta" value="<?php echo $respuestas[1]; ?>" />
            <input type="submit" class="botonesvai" name="respuesta" value="<?php echo $respuestas[2]; ?>" />
        </form>
	
        <?php 
			echo "<p class='vai1respuesta'>$preparando_respuesta</p>";
			} ?>
			<img src="../../assets/img/Favicon-Big-img.png" >
        <?php

          if ($mostrar_puntos) {

            echo "<h2>Respuestas correctas: " . $_SESSION['totcorrectas']
        . " de " . $totpreguntas . " preguntas</h2>"; ?>

        <form action="index.php" method="POST">

            <input type="submit" class="botonesvai" value="Intentar de nuevo" />

        </form>

        <?php 
			
			
			} ?>
    </div>
</body>
</html>