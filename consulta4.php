    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Cálculo de Sueldo</title>
        <link rel="stylesheet" href="consulta4.css">
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
        <h1>Cálculo de Sueldo</h1>

        <form method="POST" action="">
            <label for="nombre">Nombre del trabajador:</label>
            <input type="text" id="nombre" name="nombre" required />

            <label for="horas">Horas trabajadas:</label>
            <input type="number" id="horas" name="horas" min="1" required />

            <label for="pago">Pago por hora:</label>
            <input type="number" id="pago" name="pago" min="1" required />

            <button type="submit">Calcular Sueldo</button>
        </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = htmlspecialchars($_POST['nombre']);
        $horas = intval($_POST['horas']);
        $pagoPorHora = floatval($_POST['pago']);

        $sueldoBruto = $horas * $pagoPorHora;

        if ($sueldoBruto > 1500) {
            $retencion = $sueldoBruto * 0.10;
        } else {
            $retencion = 0;
        }

        $sueldoNeto = $sueldoBruto - $retencion;

        echo "<div class='resultado'>";
        echo "<p>Trabajador: <strong>$nombre</strong></p>";
        echo "<p>Horas trabajadas: <strong>$horas</strong></p>";
        echo "<p>Pago por hora: <strong>$" . number_format($pagoPorHora, 2) . "</strong></p>";
        echo "<p>Sueldo Bruto: <strong>$" . number_format($sueldoBruto, 2) . "</strong></p>";
        echo "<p>Retención (10%): <strong>$" . number_format($retencion, 2) . "</strong></p>";
        echo "<p>Sueldo Neto: <strong>$" . number_format($sueldoNeto, 2) . "</strong></p>";
        echo "</div>";
    }
    ?>

    </div>

    </body>
    </html>
