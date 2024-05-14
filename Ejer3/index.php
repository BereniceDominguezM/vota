<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Votación de Animes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }

        h3, h2 {
            color: #333;
        }

        section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            text-align: center;
            padding: 20px;
            border: 1px solid #cccccc;
            vertical-align: top;
        }

        img {
            width: 150px;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #ganadora {
            font-weight: bold;
            color: #333;
            padding: 10px;
        }

        .resultado {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h3 id="centrado">VOTACIÓN DE ANIMES</h3>
        <h2 id="titulo">MEJOR SERIE DE ANIME</h2>
    </header>
    <section>
        <?php
        error_reporting(0);
        session_start();
        
        $total = $_SESSION['total'] ?? 1; // Avoid division by zero
        $pcandidata1 = ($_SESSION['Anime1'] ?? 0) * 100 / $total;
        $pcandidata2 = ($_SESSION['Anime2'] ?? 0) * 100 / $total;
        $pcandidata3 = ($_SESSION['Anime3'] ?? 0) * 100 / $total;
        $pcandidata4 = ($_SESSION['Anime4'] ?? 0) * 100 / $total;
        ?>
        <form name="frmVotacion" method="POST" action="conteo2.php">
            <table>
                <tr>
                    <td>
                        <img src="Anime.jpg" alt="My Hero Academy" />
                        <p>My Hero Academy, serie de 4 temporadas</p>
                        <input type="submit" value="Votar" name="btnBoton1" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['Anime1'] ?? 0; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata1, 2); ?>%
                    </td>
                    <td>
                        <img src="anime2.webp" alt="Attack on Titan" />
                        <p>Attack on Titan, serie de 3 temporadas</p>
                        <input type="submit" value="Votar" name="btnBoton2" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['Anime2'] ?? 0; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata2, 2); ?>%
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="anime3.jpg" alt="Dragon Ball Z" />
                        <p>Dragon Ball Z, con más de 5 series</p>
                        <input type="submit" value="Votar" name="btnBoton3" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['Anime3'] ?? 0; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata3, 2); ?>%
                    </td>
                    <td>
                        <img src="anime4.jpg" alt="One Piece" />
                        <p>One Piece, con una serie</p>
                        <input type="submit" value="Votar" name="btnBoton4" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['Anime4'] ?? 0; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata4, 2); ?>%
                    </td>
                </tr>
            </table>
        </form>
        <?php
        $arreglo = array(
            'My Hero Academy' => $_SESSION['Anime1'] ?? 0,
            'Attack on Titan' => $_SESSION['Anime2'] ?? 0,
            'Dragon Ball Z' => $_SESSION['Anime3'] ?? 0,
            'One Piece' => $_SESSION['Anime4'] ?? 0
        );
        arsort($arreglo);
        reset($arreglo);
        list($candidata, $puntaje) = each($arreglo);
        ?>
        <div class="resultado">
            <table>
                <tr>
                    <td id="ganadora">TOTAL DE VOTANTES: <?php echo $_SESSION['total'] ?? 0; ?></td>
                </tr>
                <tr>
                    <td id="ganadora">GANADORA: <?php echo $candidata; ?> (<?php echo $puntaje; ?> votos)</td>
                </tr>
            </table>
        </div>
    </section>
    <footer>
        <h5 id="centrado">Todos los derechos reservados @2025 Diseñado por Berenice Dominguez</h5>
    </footer>
</body>

</html>