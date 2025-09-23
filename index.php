<?php

require_once __DIR__ . '/src/UserSystem.php';
$system = new UserSystem();

echo "<h1>-------- CASOS DE TESTE --------</h1><br>";

echo "<strong>Caso 1 - </strong>Cadastro válido: <br>";
echo $system->register('Ana Pereira', 'ana@email.com', 'Senha123A');
echo "<br>";

echo "<strong>Caso 2 - </strong>E-mail inválido: <br>";
echo $system->register('Pedro', 'pedro@@email', 'Senha123');
echo "<br>";

echo "<strong>Caso 3 - </strong>Login senha errada: <br>";
echo $system->login('joao@email.com', 'Errada123');
echo "<br>";

echo "<strong>Caso 4 - </strong>Reset de senha: <br>";
echo $system->resetPassword(1, 'NovaSenha1');
echo "<br>";

echo "<strong>Caso 5 - </strong>E-mail duplicado: <br>";
echo $system->register('Outro', 'joao@email.com', 'Senha123');
echo "<br>";

echo "<strong>Caso 6 - </strong>Cadastro senha fraca: <br>";
echo $system->register('Teste', 'teste@email.com', 'senha');
echo "<br>";

echo "<strong>Caso 7 - </strong>Login usuário inexistente: <br>";
echo $system->login('inexistente@email.com', 'Senha123');
echo "<br>";

echo "<strong>Caso 8 - </strong>Reset usuário inexistente: <br>";
echo $system->resetPassword(999, 'Senha1234');
echo "<br>";

echo "<strong>Caso 9 - </strong>Reset senha fraca: <br>";
echo $system->resetPassword(2, 'senha');
echo "<br>";