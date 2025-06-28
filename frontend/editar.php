<?php
$id = $_GET['id'];
$data = file_get_contents("http://localhost:3000/api/animales/$id");
$animal = json_decode($data, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo = json_encode($_POST);
    $opts = [
        'http' => [
            'header' => "Content-Type: application/json",
            'method' => 'PUT',
            'content' => $nuevo
        ]
    ];
    file_get_contents("http://localhost:3000/api/animales/$id", false, stream_context_create($opts));
    header("Location: index.php");
    exit;
}
?>
<form method="post">
  Nombre: <input name="nombre" value="<?= $animal['nombre'] ?>" required><br>
  Tipo: <input name="tipo" value="<?= $animal['tipo'] ?>" required><br>
  Sexo: <select name="sexo" required>
    <option value="M" <?= $animal['sexo'] === 'M' ? 'selected' : '' ?>>Macho</option>
    <option value="F" <?= $animal['sexo'] === 'F' ? 'selected' : '' ?>>Hembra</option>
  </select><br>
  Raza: <input name="raza" value="<?= $animal['raza'] ?>" required></br>
  Fecha Nac: <input type="date" name="fecha_nacimiento" value="<?= $animal['fecha_nacimiento'] ?>" required></br>
  Peso: <input type="number" name="peso" value="<?= $animal['peso'] ?>" required></br>
  Estado: <input name="estado" value="<?= $animal['estado'] ?>" required></br>
  <button type="submit">Actualizar</button>
</form>
