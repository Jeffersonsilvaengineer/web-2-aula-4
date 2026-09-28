<?php
$opcao = $_POST['opcao'] ?? null;
$mensagem = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_string($opcao)) {
    switch ($opcao) {
        case 'vermelho': $mensagem = 'Pare!'; break;
        case 'amarelo': $mensagem = 'Atenção.'; break;
        case 'verde': $mensagem = 'Siga.'; break;
        case 'piscando': $mensagem = 'Siga com cuidado!.'; break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semáforo</title>
    <style>body{font:1.1rem Arial,sans-serif;max-width:600px;margin:3rem auto;padding:0 1rem;line-height:1.5}label{display:block;margin:.8rem 0}button{font:inherit;padding:.5rem 1rem}</style>
</head>
<body>
    <h1>Semáforo</h1>
    <form method="post">
        <fieldset>
            <legend>Selecione a opção</legend>
            <?php foreach (['vermelho' => 'Vermelho', 'amarelo' => 'Amarelo', 'verde' => 'Verde', 'piscando' => 'Piscando'] as $valor => $rotulo): ?>
                <label><input type="radio" name="opcao" value="<?= $valor ?>" <?= $opcao === $valor ? 'checked' : '' ?> required> <?= $rotulo ?></label>
            <?php endforeach; ?>
        </fieldset>
        <button type="submit">Mostrar mensagem</button>
    </form>
    <?php if ($mensagem !== null): ?><p><strong><?= $mensagem ?></strong></p><?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?><p>Selecione uma opção válida.</p><?php endif; ?>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>
