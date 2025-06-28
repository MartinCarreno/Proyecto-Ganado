<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = json_encode($_POST);
    $opts = [
      'http' => [
        'header' => "Content-Type: application/json",
        'method' => 'POST',
        'content' => $json
      ]
    ];
    file_get_contents("http://localhost:3000/api/produccion", false, stream_context_create($opts));
    header("Location: index.php");
}
?>
<form method="post">
  ID animal: <input name="animal_id" required><br>
  Fecha: <input type="date" name="fecha" required><br>
  Litros: <input type="number" step="0.1" name="litros" required><br>
  <button type="submit">Guardar</button>
</form>
