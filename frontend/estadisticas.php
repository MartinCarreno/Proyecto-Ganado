<?php
$general = json_decode(file_get_contents("http://localhost:3000/api/utils/general"), true);
//var_dump($general); // Para depuración

$top = json_decode(file_get_contents("http://localhost:3000/api/utils/top"), true);
//var_dump($top); // Para depuración

$partos = json_decode(file_get_contents("http://localhost:3000/api/utils/partos"), true);
//var_dump($partos); // Para depuración
//exit;

if (isset($general[0]) && isset($general[0][0])) {
    $general = $general[0];
} elseif (isset($general[0])) {
    $general = $general[0];
}

if (isset($top[0]) && isset($top[0][0])) {
    $top = $top[0];
} elseif (isset($top[0])) {
    $top = $top[0];
}

if (isset($partos[0]) && isset($partos[0][0])) {
    $partos = $partos[0];
} elseif (isset($partos[0])) {
    $partos = $partos[0];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Estadísticas Ganaderas</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    .bloque { background: #f4f4f4; padding: 15px; margin-bottom: 20px; border-radius: 6px; }
    table, th, td { border: 1px solid gray; border-collapse: collapse; padding: 6px; }
  </style>
</head>
<body>
<h1>📊 Estadísticas Ganaderas</h1>

<div class="bloque">
  <h3>Resumen general</h3>
  <p>🐄 Total de animales activos: <strong><?= $general['total_animales'] ?></strong></p>
  <p>📅 Edad promedio: <strong><?= $general['edad_promedio'] ?> años</strong></p>
  <p>🥛 Producción promedio diaria: <strong><?= $general['promedio_general'] ?> litros</strong></p>
</div>

<div class="bloque">
  <h3>Top 5 animales más productores</h3>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Promedio Leche (litros)</th></tr>
    <?php foreach ($top as $a): ?>
      <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['nombre'] ?></td>
        <td><?= $a['promedio'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<div class="bloque">
  <h3>Resumen de partos registrados</h3>
  <ul>
    <?php foreach ($partos as $p): ?>
      <li>👶 <?= ucfirst($p['resultado']) ?>: <strong><?= $p['cantidad'] ?></strong></li>
    <?php endforeach; ?>
  </ul>
</div>

<a href="index.php">⬅️ Volver</a>
</body>
</html>
