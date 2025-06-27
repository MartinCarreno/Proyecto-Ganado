<?php
$data = file_get_contents("http://localhost:3000/api/animales");
$animales = json_decode($data, true);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema Ganadero</title>
  <style>
    body { font-family: Arial; padding: 20px; }
    table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    a.button { padding: 6px 12px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; margin-right: 5px; }
    .resumen { background: #f1f1f1; padding: 10px; margin-bottom: 20px; border-radius: 6px; }
  </style>
</head>
<body>

<h1>Sistema de Registro Ganadero</h1>

<div class="resumen">
  <h3>📊 Estadísticas generales</h3>
  <p>🐄 Total de animales activos: <strong><?= $stats['total_animales'] ?></strong></p>
  <p>📅 Edad promedio: <strong><?= $stats['edad_promedio'] ?> años</strong></p>
  <p>🥛 Producción promedio diaria: <strong><?= $stats['promedio_general'] ?> litros</strong></p>
</div>

<nav>
  <a class="button" href="crear.php"> + Registrar nuevo animal</a>
  <a class="button" href="registrar_vacuna.php">Registrar vacuna</a>
  <a class="button" href="registrar_produccion.php">Registrar producción</a>
  <a class="button" href="crear_parto.php">Registrar parto</a>
  <a class="button" href="estadisticas.php">Ver estadísticas</a>
</nav>

<br><hr><br>

<h2>Animales Registrados</h2>
<table>
<tr>
  <th>ID</th><th>Nombre</th><th>Tipo</th><th>Raza</th><th>Estado</th>
  <th>Edad</th><th>Promedio Leche</th><th>Acciones</th>
</tr>
<?php foreach ($animales as $animal): ?>
<tr>
  <td><?= $animal['id'] ?></td>
  <td><?= $animal['nombre'] ?></td>
  <td><?= $animal['tipo'] ?></td>
  <td><?= $animal['raza'] ?></td>
  <td><?= $animal['estado'] ?></td>
  <td><?= $animal['edad'] ?> años</td>
  <td><?= $animal['promedio'] ?> litros</td>
  <td>
    <a href="editar.php?id=<?= $animal['id'] ?>">✏️ Editar</a> |
    <a href="eliminar.php?id=<?= $animal['id'] ?>" onclick="return confirm('¿Inactivar este animal?')">❌ Eliminar</a>
  </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
