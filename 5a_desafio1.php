<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $ano = $_POST['ano_nascimento'];
    $idade = date('Y') - $ano;

    if ($idade >= 18) {
        $mensagem = "Acesso permitido, $nome!";
        file_put_contents('log_acessos.txt', "$nome - $idade anos\n", FILE_APPEND);
    } else {
        $mensagem = "Acesso negado, $nome!";
    }
}

// Exibe a estrutura da página usando eco do PHP
echo "
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <title>Desafio 1</title>
</head>
<body>
    <form method='POST'>
        Nome: <input type='text' name='nome' required><br><br>
        Ano de Nascimento: <input type='number' name='ano_nascimento' required><br><br>
        <button type='submit'>Verificar</button>
    </form>
";

// Exibe a mensagem se ela não estiver vazia
if ($mensagem) {
    echo "<h3>$mensagem</h3>";
}

echo "
</body>
</html>
";
?>