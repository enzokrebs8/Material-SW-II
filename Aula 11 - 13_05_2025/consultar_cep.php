<?php
$erro = '';
$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$busca = preg_replace('/\D/', '', $busca);
$consultar_cep = [];

if ($busca !== '') {
    if (preg_match('/^[0-9]{8}$/', $busca)) {
        $url = "https://viacep.com.br/ws/$busca/json/";
        $resposta = @file_get_contents($url); // @ evita warning caso a URL falhe

        if ($resposta !== false) {
            $consultar_cep = json_decode($resposta, true);

            if (isset($consultar_cep['erro']) && $consultar_cep['erro'] === true) {
                $erro = 'CEP não encontrado.';
                $consultar_cep = [];
            }
        } else {
            $erro = 'Erro ao conectar com a API do ViaCEP.';
        }
    } else {
        $erro = 'Digite um CEP válido com 8 dígitos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar CEP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>Consulta de Endereço via CEP</h1>
    
    <center>
        <form action="" method="get">
            <input type="text" name="busca" placeholder="Digite o CEP (ex: 09402060)" value="<?php echo htmlspecialchars($busca); ?>">
            <button type="submit">Consultar</button>
        </form>
        <br>
    </center>

    <div class="container">
        <?php if ($erro): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php elseif (empty($consultar_cep)): ?>
            <p>Nenhum CEP encontrado.</p>
        <?php else: ?>
            <div class="card">
                <p><strong>CEP:</strong> <?php echo $consultar_cep['cep'] ?? 'Não disponível'; ?></p>
                <p><strong>Logradouro:</strong> <?php echo $consultar_cep['logradouro'] ?? 'Não disponível'; ?></p>
                <p><strong>Bairro:</strong> <?php echo $consultar_cep['bairro'] ?? 'Não disponível'; ?></p>
                <p><strong>Localidade (Cidade):</strong> <?php echo $consultar_cep['localidade'] ?? 'Não disponível'; ?></p>
                <p><strong>UF:</strong> <?php echo $consultar_cep['uf'] ?? 'Não disponível'; ?></p>
                <p><strong>Estado:</strong> <?php echo $consultar_cep['estado'] ?? 'Não disponível'; ?></p>
                <p><strong>Região:</strong> <?php echo $consultar_cep['regiao'] ?? 'Não disponível'; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
