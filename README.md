# Verificador_de_Maioridade



##  Sobre o projeto

Este projeto foi desenvolvido como parte da **Atividade 3: Desafio "Verificador de Maioridade"**.

O objetivo é criar uma página em **PHP** que solicite o nome e o ano de nascimento do usuário, calcule sua idade e verifique se ele possui idade suficiente para ter acesso.

##  Funcionalidades

-  Formulário para informar o nome.
-  Campo para informar o ano de nascimento.
-  Cálculo automático da idade.
-  Exibe "Acesso permitido" para pessoas com 18 anos ou mais.
-  Exibe "Acesso negado" para menores de 18 anos.
-  Registra os acessos permitidos no arquivo `log_acessos.txt`.

##  Tecnologias utilizadas

- **PHP**
- **HTML**
- **Método POST**
- **Arquivo TXT para armazenamento dos acessos**

--- 

código:

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


