
<?php
    $cep = isset($_GET['cep']) ? : '';
    
    // Obter os dados da API
    $url = "https://viacep.com.br/ws/09400500/json/";
    $resposta = file_get_contents($url);
    $consultar_cep = json_decode($resposta, true);

    if($cep !== ''){
        $cunsultar_cep = array_filter($cunsultar_cep, function ($consulta) use ($cep){
            return $consulta['cep'], $cep !== false;
        });
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar CEP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Consultar CEP</h1>

    <form action="">
        <input type="number" name="cep" placeholder="Digite o CEP que deseja consultar" value="<?php echo htmlspecialchars($cep); ?>">
        <button type="submit">Buscar</button>
    </form>

    <div class="container">
        <?php if (empty($consultar_cep)): ?>
            <p>Nenhum país encontrado.</p>
        <?php else: ?>
            <?php foreach ($consultar_cep as $consulta): ?>
                <div class="card">
                    <h3><?php echo $consulta['cep']; ?></h3>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>