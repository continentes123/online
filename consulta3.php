<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Promedio Final del Alumno</title>
    <link rel="stylesheet" href="consulta3.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #121212;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: #222;
            padding: 25px 30px;
            border-radius: 12px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.7);
        }
        h1 {
            text-align: center;
            color: #90caf9;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }
        input[type="text"],
        select,
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: none;
            font-size: 1rem;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            background-color: #90caf9;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #121212;
        }
        button:hover {
            background-color: #64b5f6;
        }
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #90caf9;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #1565c0;
        }
        .resultado {
            margin-top: 15px;
            padding: 12px;
            background: #1976d2;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(25, 118, 210, 0.7);
            color: white;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Promedio Final del Alumno</h1>

    <form method="POST" action="">
        <label for="nombre">Nombre del alumno:</label>
        <input type="text" id="nombre" name="nombre" required value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>" />

        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="">--Seleccione--</option>
            <option value="MASCULINO" <?php if(isset($_POST['genero']) && $_POST['genero'] === 'MASCULINO') echo 'selected'; ?>>Masculino</option>
            <option value="FEMENINO" <?php if(isset($_POST['genero']) && $_POST['genero'] === 'FEMENINO') echo 'selected'; ?>>Femenino</option>
        </select>

        <label for="n1">Nota 1:</label>
        <input type="number" id="n1" name="n1" min="0" max="20" required value="<?php echo isset($_POST['n1']) ? htmlspecialchars($_POST['n1']) : ''; ?>" />

        <label for="n2">Nota 2:</label>
        <input type="number" id="n2" name="n2" min="0" max="20" required value="<?php echo isset($_POST['n2']) ? htmlspecialchars($_POST['n2']) : ''; ?>" />

        <label for="n3">Nota 3:</label>
        <input type="number" id="n3" name="n3" min="0" max="20" required value="<?php echo isset($_POST['n3']) ? htmlspecialchars($_POST['n3']) : ''; ?>" />

        <label for="n4">Nota 4:</label>
        <input type="number" id="n4" name="n4" min="0" max="20" required value="<?php echo isset($_POST['n4']) ? htmlspecialchars($_POST['n4']) : ''; ?>" />

        <button type="submit">Calcular Promedios</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $genero = $_POST['genero'];
    $notas = [
        floatval($_POST['n1']),
        floatval($_POST['n2']),
        floatval($_POST['n3']),
        floatval($_POST['n4'])
    ];

    $promedioFinal = array_sum($notas) / count($notas);

    if ($genero === "MASCULINO") {
        $nuevoPromedio = $promedioFinal + 3;
    } else {
        $nuevoPromedio = $promedioFinal + 5;
    }

    echo "<div class='resultado'>";
    echo "<p>Alumno: <strong>$nombre</strong></p>";
    echo "<p>Género: <strong>$genero</strong></p>";
    echo "<p>Promedio Final (PF): <strong>" . number_format($promedioFinal, 2) . "</strong></p>";
    echo "<p>Nuevo Promedio (NP): <strong>" . number_format($nuevoPromedio, 2) . "</strong></p>";
    echo "</div>";
}
?>

</div>

</body>
</html>
