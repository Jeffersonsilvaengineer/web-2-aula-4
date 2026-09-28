<?php
$nome = trim((string) ($_POST['nome'] ?? ''));
$nome = $nome !== '' ? $nome : 'Fulano';
$cores = ['black' => 'Preto', 'blue' => 'Azul', 'green' => 'Verde', 'red' => 'Vermelho', 'white' => 'Branco'];
$corEnviada = $_POST['cor'] ?? 'black';
$cor = is_string($corEnviada) && array_key_exists($corEnviada, $cores) ? $corEnviada : 'black';
$corTexto = $cor === 'white' ? 'black' : 'white';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nome e cor de fundo</title>
    <style>body{font:1.1rem Arial,sans-serif;max-width:600px;margin:3rem auto;padding:0 1rem;line-height:1.5}label{display:block;margin:.8rem 0}input,select,button{font:inherit;padding:.4rem}.resultado{padding:2rem;border:1px solid #777;border-radius:8px}</style>
</head>
<body>
    <h1>Nome e cor de fundo</h1>
    <form method="post">
        <label>Nome: <input type="text" name="nome" placeholder="Fulano" value="<?= htmlspecialchars($nome === 'Fulano' ? '' : $nome, ENT_QUOTES, 'UTF-8') ?>"></label>
        <label>Cor de fundo:
            <select name="cor">
                <?php foreach ($cores as $valor => $rotulo): ?>
                    <option value="<?= $valor ?>" <?= $cor === $valor ? 'selected' : '' ?>><?= $rotulo ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit">Mostrar</button>
    </form>
    <p class="resultado" style="background-color: <?= $cor ?>; color: <?= $corTexto ?>;"><?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?></p>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>
