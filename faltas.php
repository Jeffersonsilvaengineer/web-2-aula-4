<?php
$faltas = filter_input(INPUT_POST, 'faltas', FILTER_VALIDATE_INT);
$maximo = filter_input(INPUT_POST, 'maximo', FILTER_VALIDATE_INT);
$enviado = $_SERVER['REQUEST_METHOD'] === 'POST';
$erro = $enviado && ($faltas === false || $faltas === null || $faltas < 0 || !in_array($maximo, [10, 20], true));
$resultado = $enviado && !$erro ? ($faltas > $maximo ? 'Reprovado por falta' : 'Aprovado') : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de faltas</title>
    <style>body{font:1.1rem Arial,sans-serif;max-width:600px;margin:3rem auto;padding:0 1rem;line-height:1.5}label{display:block;margin:.8rem 0}input,button{font:inherit}button{padding:.5rem 1rem}.erro{color:#a00}</style>
</head>
<body>
    <h1>Controle de faltas</h1>
    <form method="post">
        <label>Quantidade de faltas:
            <input type="number" name="faltas" min="0" required value="<?= $faltas !== false && $faltas !== null && $faltas >= 0 ? $faltas : '' ?>">
        </label>
        <fieldset>
            <legend>Quantidade máxima de faltas</legend>
            <label><input type="radio" name="maximo" value="10" <?= $maximo === 10 ? 'checked' : '' ?> required> 10</label>
            <label><input type="radio" name="maximo" value="20" <?= $maximo === 20 ? 'checked' : '' ?>> 20</label>
        </fieldset>
        <button type="submit">Verificar</button>
    </form>
    <?php if ($erro): ?><p class="erro">Informe uma quantidade válida de faltas e selecione 10 ou 20.</p><?php endif; ?>
    <?php if ($resultado !== ''): ?><p><strong>Resultado: <?= $resultado ?></strong></p><?php endif; ?>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>
