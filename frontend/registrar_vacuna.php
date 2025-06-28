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
    file_get_contents("http://localhost:3000/api/vacunas", false, stream_context_create($opts));
    header("Location: index.php");
}
?>
<form method="post">
  ID animal: <input name="animal_id" required><br>
  Vacuna: <input name="nombre_vacuna" required><br>
  Fecha: <input type="date" name="fecha_aplicacion" required><br>
  Veterinario: <input name="veterinario" required><br>
  <button type="submit">Registrar vacuna</button>
</form>
