<?php
$id = $_GET['id'];
$opts = [
  'http' => [
    'method' => 'DELETE'
  ]
];
file_get_contents("http://localhost:3000/api/animales/$id", false, stream_context_create($opts));
header("Location: index.php");
exit;
