
<?php   
$id = $_GET['id'];

// Obtener datos del animal
$animal = json_decode(file_get_contents("http://localhost:3000/api/animales/$id"), true);

// Obtener vacunas
$vacunas = json_decode(file_get_contents("http://localhost:3000/api/vacunas/animal/$id"), true);


// Obtener partos
$partos = json_decode(file_get_contents("http://localhost:3000/api/partos/animal/$id"), true);

// Obtener producción
$produccion = json_decode(file_get_contents("http://localhost:3000/api/produccion/$id"), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro del Animal</title>
    <style>
        table, th, td { border: 1px solid #888; border-collapse: collapse; padding: 6px; }
        h2 { margin-top: 30px; }
    </style>
</head>
<body>
    <h1>Registro de <?= htmlspecialchars($animal['nombre']) ?> (ID: <?= $animal['id'] ?>)</h1>
    <p><strong>Tipo:</strong> <?= $animal['tipo'] ?> | <strong>Sexo:</strong> <?= $animal['sexo'] ?> | <strong>Raza:</strong> <?= $animal['raza'] ?> | <strong>Fecha de Nacimiento:</strong> <?= date('d-m-Y', strtotime($animal['fecha_nacimiento'])) ?></p>

    <h2>Vacunas</h2>
    <table>
        <tr><th>Nombre</th><th>Fecha</th><th>Veterinario</th></tr>
        <?php foreach ($vacunas as $v): ?>
            <tr>
                <td><?= $v['nombre_vacuna'] ?></td>
                <td><?= $v['fecha_aplicacion'] ?></td>
                <td><?= $v['veterinario'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Partos</h2>
    <table>
        <tr><th>Fecha</th><th>Resultado</th><th>Nombre Cría</th></tr>
        <?php foreach ($partos as $p): ?>
            <tr>
                <td><?= $p['fecha'] ?? '' ?></td>
                <td><?= $p['resultado'] ?? '' ?></td>
                <td><?= $p['cria_nombre'] ?? '' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Producción</h2>
    <table>
        <tr><th>Fecha</th><th>Litros</th></tr>
        <?php foreach ($produccion as $pr): ?>
            <tr>
                <td><?= $pr['fecha'] ?></td>
                <td><?= $pr['litros'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="index.php">Volver</a></p>
</body>
</html>