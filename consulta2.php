<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulta de Costo de Llamada</title>
    <link rel="stylesheet" href="consulta2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #121212;
            color: white;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }
        .container {
            background: #222;
            padding: 30px 40px;
            border-radius: 12px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0,0,0,0.6);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #90caf9;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: none;
            font-size: 1rem;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #90caf9;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            color: #121212;
        }
        button:hover {
            background-color: #64b5f6;
        }
        .resultado {
            margin-top: 25px;
            background: #1976d2;
            padding: 20px;
            border-radius: 8px;
            color: white;
            box-shadow: 0 3px 10px rgba(25, 118, 210, 0.7);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #90caf9;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Consulta de Costo de Llamada</h1>
    
    <form method="POST" action="">
        <label for="clave">Clave de Zona (ej. 12, 15, 18, ...):</label>
        <input type="number" id="clave" name="clave" min="12" max="29" step="1" required value="<?php echo isset($_POST['clave']) ? htmlspecialchars($_POST['clave']) : ''; ?>" />
        
        <label for="minutos">Número de minutos hablados:</label>
        <input type="number" id="minutos" name="minutos" min="1" required value="<?php echo isset($_POST['minutos']) ? htmlspecialchars($_POST['minutos']) : ''; ?>" />
        
        <button type="submit">Calcular Costo</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $clave = intval($_POST['clave']);
        $minutos = intval($_POST['minutos']);

        $zonas = [
            12 => ['América del Norte', 2.1],
            15 => ['América Central', 2.6],
            18 => ['América del Sur', 4.5],
            19 => ['Europa', 3.6],
            23 => ['Asia', 6.5],
            25 => ['África', 7.8],
            29 => ['Oceanía', 3.9],
        ];

        if (isset($zonas[$clave])) {
            $zona = $zonas[$clave][0];
            $precio = $zonas[$clave][1];
            $costoTotal = $precio * $minutos;

            echo "<div class='resultado'>";
            echo "<h2>Resultado</h2>";
            echo "<p><strong>Zona:</strong> $zona</p>";
            echo "<p><strong>Precio por minuto:</strong> $$precio</p>";
            echo "<p><strong>Minutos hablados:</strong> $minutos</p>";
            echo "<hr>";
            echo "<p><strong>Costo total:</strong> $".number_format($costoTotal, 2)."</p>";
            echo "</div>";
        } else {
            echo "<div class='resultado' style='background: #b71c1c;'>Clave no válida. Por favor ingrese una clave correcta.</div>";
        }
    }
    ?>

    <h3>Tabla de Precios</h3>
    <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Zona</th>
                <th>Precio por minuto ($)</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>12</td><td>América del Norte</td><td>2.1</td></tr>
            <tr><td>15</td><td>América Central</td><td>2.6</td></tr>
            <tr><td>18</td><td>América del Sur</td><td>4.5</td></tr>
            <tr><td>19</td><td>Europa</td><td>3.6</td></tr>
            <tr><td>23</td><td>Asia</td><td>6.5</td></tr>
            <tr><td>25</td><td>África</td><td>7.8</td></tr>
            <tr><td>29</td><td>Oceanía</td><td>3.9</td></tr>
        </tbody>
    </table>
</div>
</body>
</html>
