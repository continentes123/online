<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulta de pago</title>
    <link rel="stylesheet" href="consulta1.css" />
</head>
<body>

<div class="container">
    <h1>Consulta de Pago</h1>

    <form method="POST" action="">
        <label for="sueldo">Ingrese su sueldo base:</label>
        <input type="number" step="0.01" name="sueldo" id="sueldo" required placeholder="Ejemplo: 1000" value="<?php echo isset($_POST['sueldo']) ? htmlspecialchars($_POST['sueldo']) : ''; ?>" />

        <label for="categoria">Seleccione su categoría:</label>
        <select name="categoria" id="categoria" required>
            <option value="" disabled <?php echo !isset($_POST['categoria']) ? 'selected' : ''; ?>>-- Seleccione --</option>
            <option value="1" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] == 1) ? 'selected' : ''; ?>>Categoría 1 (30% aumento)</option>
            <option value="2" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] == 2) ? 'selected' : ''; ?>>Categoría 2 (20% aumento)</option>
            <option value="3" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] == 3) ? 'selected' : ''; ?>>Categoría 3 (15% aumento)</option>
            <option value="4" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] == 4) ? 'selected' : ''; ?>>Categoría 4 (10% aumento)</option>
        </select>

        <button type="submit">Calcular</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sueldo = floatval($_POST['sueldo']);
    $categoria = intval($_POST['categoria']);
    $Nsueldo = 0;

    if ($categoria == 1) {
        $Nsueldo = $sueldo * 1.30;
    } elseif ($categoria == 2) {
        $Nsueldo = $sueldo * 1.20;
    } elseif ($categoria == 3) {
        $Nsueldo = $sueldo * 1.15;
    } else {
        $Nsueldo = $sueldo * 1.10;
    }

    echo "<div class='resultado'>";
    echo "<h2>Resultados:</h2>";
    echo "<p>Sueldo base: <strong>$".number_format($sueldo, 2)."</strong></p>";
    echo "<p>Categoría: <strong>$categoria</strong></p>";
    echo "<hr>";
    echo "<p>Nuevo sueldo: <strong>$".number_format($Nsueldo, 2)."</strong></p>";
    echo "</div>";
}
?>

</div>

</body>
</html>
