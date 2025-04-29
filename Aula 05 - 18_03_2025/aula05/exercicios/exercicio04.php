<?php

  $buscarEmail = $_GET["email"];

  $jsonUsers = file_get_contents("usuarios.json");
  $users = json_decode($jsonUsers, true);

  $userEncontrado = null;
  foreach ($users as $user) {
    if ($user["email"] == $buscarEmail) {
      $userEncontrado = $user;
      break;
    }
  }

  if ($userEncontrado) {
    echo "Usuário encontrado:<br>";
    echo "Nome: " . $userEncontrado["nome"] . "<br>";
    echo "Email: " . $userEncontrado["email"] . "<br>";
  }
  else {
    echo "Usuário não encontrado.";
  }

?>