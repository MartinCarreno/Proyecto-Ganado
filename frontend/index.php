<?php
$data = file_get_contents("http://localhost:3000/api/animales");
$animales = json_decode($data, true);
?>
<!DOCTYPE html>
<html>
<head><title>Lista de Animales</title></head>
<body>
<h1>Animales registrados</h1>
<a href="crear.php">Agregar nuevo</a>
<table border="1">
<tr>
  <th>ID</th><th>Nombre</th><th>Tipo</th><th>Raza</th><th>Estado</th><th>Acciones</th>
</tr>
<?php foreach ($animales as $animal): ?>
<tr>
  <td><?= $animal['id'] ?></td>
  <td><?= $animal['nombre'] ?></td>
  <td><?= $animal['tipo'] ?></td>
  <td><?= $animal['raza'] ?></td>
  <td><?= $animal['estado'] ?></td>
  <td>
    <a href="editar.php?id=<?= $animal['id'] ?>">Editar</a> |
    <a href="eliminar.php?id=<?= $animal['id'] ?>">Eliminar</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
