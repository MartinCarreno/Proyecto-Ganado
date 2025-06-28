<?php
// Obtener animales activos para el selector
$animales = json_decode(file_get_contents("http://localhost:3000/api/animales"), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'animal_id' => $_POST['animal_id'],
        'fecha' => $_POST['fecha'],
        'resultado' => $_POST['resultado'],
        'sexo' => $_POST['sexo'],
        'cria_nombre' => $_POST['cria_nombre']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json",
            'method'  => 'POST',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents("http://localhost:3000/api/utils/parto", false, $context);

    // Validiacion si esta correcto el registro
    if ($response !== false) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar el parto.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrar Parto</title>
</head>

<body>
    <h2>Registrar Nuevo Parto</h2>
    <form method="POST">
        <label for="animal_id">Animal:</label>
        <select name="animal_id" required>
            <?php foreach ($animales as $a): ?>
                <!-- Solo vacas hembras -->
                <?php if ($a['tipo'] === 'vaca' && $a['sexo'] === 'F' && $a['estado'] === 'activo'): ?>
                    <option value="<?= $a['id'] ?>"><?= $a['nombre'] ?> (<?= $a['id'] ?>)</option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label for="resultado">Resultado:</label>
        <select name="resultado" required>
            <option value="exitoso">Exitoso</option>
            <option value="fallido">Fallido</option>
        </select><br><br>
        
        <label for="sexo">Sexo:</label>
        <select name="sexo" required>
            <option value="M">Macho</option>
            <option value="F">Hembra</option>
        </select><br><br>

        <label for="cria_nombre">Nombre de cría:</label>
        <input type="text" name="cria_nombre" required><br><br>

        <button type="submit">Registrar Parto</button>
    </form>
</body>

</html>