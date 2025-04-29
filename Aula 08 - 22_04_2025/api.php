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
            // Verifica se há um parâmetro "id" na URL
            if(isset($_GET['id'])){
                $id = intval($_GET['id']);
                $usuario_encontrado_id = null;

                // Procura o usuário pelo ID
                foreach ($usuarios as $usuario){
                    if ($usuario['id'] == $id){
                        $usuario_encontrado_id = $usuario;
                        break;
                    }
                } 
                
                if($usuario_encontrado_id){
                    echo json_encode($usuario_encontrado_id, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                } else { 
                    http_response_code(400);
                    echo json_encode(["erro" => "Usuário não encontrado."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
            } else {
                // Retorna todos os usuários
                echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            break;
        case 'POST':
            // echo "Ações do Método POST";
            $dados = json_decode(file_get_contents('php://input'), true);
            // print_r($dados);
            
            // Verifica se os campos obrigatórios foram preenchidos (sem exigir ID)
            if (!isset($dados["nome"]) || !isset($dados["email"])){
                http_response_code(400);
                echo json_encode(["erro" => "Dados incompletos."], JSON_UNESCAPED_UNICODE);
                exit;
            }
            
            // Gerar um novo ID uníco
            $novo_id = 1;
            if(!empty($usuarios)){
                $ids = array_column($usuarios, 'id');
                $novo_id = max($ids) + 1;
            }

            // Criar novo usuário
            $novo_usuario = [
                "id" => $novo_id,
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            // Adiciona ao array de usuários
            $usuarios[] = $novo_usuario;

            // Salva o array atualizado no arquivo json
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Retorna mensagem de sucesso
            echo json_encode([
                "mensagem" => "Usuário inserido com sucesso!",
                "usuário" => $novo_usuario
            ], JSON_UNESCAPED_UNICODE);

            // echo json_encode(["mensagem" => "Usuário inserido com sucesso!", "usuários" => $usuarios], JSON_UNESCAPED_UNICODE);

            // //Adiciona um novo usuário ao array existente
            // array_push($usuarios, $novoUsuario);
            // echo json_encode("Usuário inserido com sucesso!");
            // print_r($usuarios);
            break;
        case 'DELETE':
            if (!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["erro" => "ID não informado para exclusão."], JSON_UNESCAPED_UNICODE);
                exit;
            }

            $id = intval($_GET['id']);
            $encontrado = false;

            foreach ($usuarios as $index => $usuario) {
                if ($usuario['id'] == $id) {
                    unset($usuarios[$index]);
                    $usuarios = array_values($usuarios); // Reindexa o array
                    $encontrado = true;
                    break;
                }
            }

            if ($encontrado) {
                file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode(["mensagem" => "Usuário excluído com sucesso!"], JSON_UNESCAPED_UNICODE);
                echo json_encode([
                    "mensagem" => "Usuário inserido com sucesso!",
                    "usuário" => $novo_usuario
                ], JSON_UNESCAPED_UNICODE);
    
            } else {
                http_response_code(400);
                echo json_encode(["erro" => "Usuário não encontrado para exclusão."], JSON_UNESCAPED_UNICODE);
            }
            break;
        case 'PUT':
            $dados = json_decode(file_get_contents('php://input'), true);
            if (!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["erro" => "ID não informado para atualização."], JSON_UNESCAPED_UNICODE);
                exit;
            }
    
            $id = intval($_GET['id']);
            $usuario_atualizado = null;
    
            foreach ($usuarios as &$usuario) {
                if ($usuario['id'] == $id) {
                    if (isset($dados['nome'])) {
                        $usuario['nome'] = $dados['nome'];
                    }
                    if (isset($dados['email'])) {
                        $usuario['email'] = $dados['email'];
                    }
                    $usuario_atualizado = $usuario;
                    break;
                }
            }
    
            if ($usuario_atualizado) {
                file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode([
                    "mensagem" => "Usuário atualizado com sucesso!",
                    "usuário" => $usuario_atualizado
                ], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(400);
                echo json_encode(["erro" => "Usuário não encontrado para atualização."], JSON_UNESCAPED_UNICODE);
            }
            break;
    
        case 'DELETE':
            if (!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["erro" => "ID não informado para exclusão."], JSON_UNESCAPED_UNICODE);
                exit;
            }
    
            $id = intval($_GET['id']);
            $encontrado = false;
    
            foreach ($usuarios as $index => $usuario) {
                if ($usuario['id'] == $id) {
                    unset($usuarios[$index]);
                    $usuarios = array_values($usuarios); // Reindexa o array
                    $encontrado = true;
                    break;
                }
            }
    
            if ($encontrado) {
                file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo json_encode([
                    "mensagem" => "Usuário excluído com sucesso!"
                ], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(400);
                echo json_encode(["erro" => "Usuário não encontrado para exclusão."], JSON_UNESCAPED_UNICODE);
            }
            break;
        default:
            // echo "Método não encontrado :(";

            http_response_code(405); // Método não permitido
            echo json_encode(["erro" => "Método não permitido :("], JSON_UNESCAPED_UNICODE);
            break;

    };


    

    // echo json_encode($usuarios);

?>