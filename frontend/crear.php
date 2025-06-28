<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_encode($_POST);
    $opciones = [
        'http' => [
            'header' => "Content-Type: application/json",
            'method' => 'POST',
            'content' => $datos
        ]
    ];
    $contexto = stream_context_create($opciones);
    file_get_contents("http://localhost:3000/api/animales", false, $contexto);
    header("Location: index.php");
    exit;
}
?>
<form method="post">
  Nombre: <input name="nombre" required><br>
  Tipo: <select name="tipo" required>
    <option value="vaca">Vaca</option>
    <option value="toro">Toro</option>
    <option value="cría">Cría</option>
  </select><br>
  Sexo: <select name="sexo" required>
    <option value="M">Macho</option>
    <option value="F">Hembra</option>
  </select><br>
  Raza: <input name="raza" required><br>
  Fecha Nac: <input type="date" name="fecha_nacimiento" required><br>
  Peso: <input type="number" step="0.1" name="peso" required><br>
  <button type="submit">Guardar</button>
</form>
