<?php

    //Cabeçalho
    header("Content-type: application/json"); //Definindo o tipo da resposta

    $metodo = $_SERVER['REQUEST_METHOD']; // Pega informações sobre o método
    // echo "Método de requisição: " . $metodo; 
    
    // Acha o arquivo json na pasta do projeto
    $arquivo = 'usuarios.json';

    // Verifica se o arquivo existe, se não existir, cria uma array vazio
    if (!file_exists($arquivo)){
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    // Lê o conteúdo do arquivo json indicado
    $usuarios = json_decode(file_get_contents($arquivo), true);
    
    // // Conteúdo
    // $usuarios = [
    //     ["id" => 1, "nome" => "Enzo Krebs", "email" => "enzokrebs8@gmail.com"],
    //     ["id" => 2, "nome" => "Krebs Enzo", "email" => "enzokrebs70@gmail.com"]
    // ];

    // Condicional de exibição de qual o método
    switch($metodo){
        case 'GET':
            // echo "Ações do Método GET";
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            break;
        case 'POST':
            // echo "Ações do Método POST";
            $dados = json_decode(file_get_contents('php://input'), true);
            // print_r($dados);
            
            // Verifica se os campos obrigatórios foram preenchidos
            if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])){
                http_response_code(400);
                echo json_encode(["erro" => "Dados incompletos."], JSON_UNESCAPED_UNICODE);
                exit;
            }
            
            // Criar novo usuário
            $novo_usuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            // Adiciona ao array de usuários
            $usuarios[] = $novo_usuario;

            // Salva o array atualizado no arquivo json
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Retorna mensagem de sucesso
            echo json_encode(["mensagem" => "Usuário inserido com sucesso!", "usuários" => $usuarios], JSON_UNESCAPED_UNICODE);

            // //Adiciona um novo usuário ao array existente
            // array_push($usuarios, $novoUsuario);
            // echo json_encode("Usuário inserido com sucesso!");
            // print_r($usuarios);

            break;
        default:
            echo "Método não encontrado :(";
            break;

    };


    

    // echo json_encode($usuarios);

?>