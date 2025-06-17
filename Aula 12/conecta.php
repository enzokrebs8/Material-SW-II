<?php
    $host = "localhost";
    $banco = "loja";
    $usuario = "root";
    $senha = "";

    try {
        $conexao = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro Genérico: " . $e->getMessage();
    }
?>