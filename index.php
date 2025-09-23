<?php

require_once __DIR__ . '/UserSystem.php';

$system = new UserSystem();

echo "-------- CASOS DE TESTE PRD --------\n";

echo "Caso 1 - Cadastro válido: ";
echo $system->register('Ana Pereira', 'ana@email.com', 'Senha123A');
echo "\n";

echo "Caso 2 - E-mail inválido: ";
echo $system->register('Pedro', 'pedro@@email', 'Senha123');
echo "\n";

echo "Caso 3 - Login senha errada: ";
echo $system->login('joao@email.com', 'Errada123');
echo "\n";

echo "Caso 4 - Reset de senha: ";
echo $system->resetPassword(1, 'NovaSenha1');
echo "\n";

echo "Caso 5 - E-mail duplicado: ";
echo $system->register('Outro', 'joao@email.com', 'Senha123');
echo "\n";

echo "Caso 6 - Cadastro senha fraca: ";
echo $system->register('Teste', 'teste@email.com', 'senha');
echo "\n";

echo "Caso 7 - Login usuário inexistente: ";
echo $system->login('inexistente@email.com', 'Senha123');
echo "\n";

echo "Caso 8 - Reset usuário inexistente: ";
echo $system->resetPassword(999, 'Senha1234');
echo "\n";

echo "Caso 9 - Reset senha fraca: ";
echo $system->resetPassword(2, 'senha');
echo "\n";

echo "-------- FIM DOS TESTES --------\n";
