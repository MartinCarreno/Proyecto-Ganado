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
  Nombre: <input name="nombre"><br>
  Tipo: <select name="tipo">
    <option value="vaca">Vaca</option>
    <option value="toro">Toro</option>
    <option value="cría">Cría</option>
  </select><br>
  Sexo: <select name="sexo">
    <option value="M">Macho</option>
    <option value="F">Hembra</option>
  </select><br>
  Raza: <input name="raza"><br>
  Fecha Nac: <input type="date" name="fecha_nacimiento"><br>
  Peso: <input type="number" step="0.1" name="peso"><br>
  <button type="submit">Guardar</button>
</form>
