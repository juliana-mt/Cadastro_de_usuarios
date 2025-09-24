Juliana Moreno Torres - 1994729<br>
Maria Fernanda De Andrade - 1998066<br>

<h1>Cadastros de usuários</h1>

<h3>Instruções de execução</h3>
1) Instalar XAMPP<br>
2) Copiar a pasta do projeto para "htdocs"<br>
3) Acessar navegador: http://localhost/cadastro_de_usuarios/index.php<br>

<h3>estruturas das pastas</h3>
Cadastro_de_usuarios/<br>
---index.php<br>
---README.md<br>
---src/<br>
------UserSystem.php<br>

<h3>Funcionalidades</h3>
• Cadastro de usuários com validação de e-mail e senha forte (mínimo 8 caracteres, 1 letra 
maiúscula e 1 número). <br>
• Prevenção de e-mails duplicados. <br>
• Login com verificação de senha usando `password_verify`. <br>
• Reset de senha para usuários já cadastrados. <br>
• Mensagens de feedback claras para cada operação. <br>

<h3>Casos de Uso (Testes)</h3> <br>
• Cadastro válido → Usuário cadastrado com sucesso. <br>
• Cadastro com e-mail inválido → Mensagem: 'E-mail inválido.' <br>
• Cadastro com senha fraca → Mensagem: 'Senha fraca.' <br>
• Cadastro com e-mail duplicado → Mensagem: 'E-mail já foi cadastrado.' <br>
• Login com credenciais corretas → Mensagem de sucesso + boas-vindas. <br>
• Login com senha incorreta → Mensagem: 'Login inválido.' <br>
• Reset de senha válido → Senha alterada com sucesso. <br>
• Reset de senha com senha fraca → Mensagem: 'Senha fraca.' <br>
• Reset de senha de usuário inexistente → Mensagem: 'Usuário não encontrado.' <br>
