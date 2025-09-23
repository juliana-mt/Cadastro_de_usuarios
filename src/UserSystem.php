<?php
Class UserSystem 
{
    private $users= [];


    public function __construct()
    {
        $this->users = [
            [
                'id' => 1, 
                'name' => 'João Silva', 
                'email' => 'Joao@email.com', 
                'password' => password_hash('SenhaForte1', PASSWORD_DEFAULT)
            ],
            [
                'id' => 2, 
                'name' => 'Maria Oliveira', 
                'email' => 'Maria@email.com', 
                'password' => password_hash('Senha123', PASSWORD_DEFAULT)
            ],
            [
                'id' => 3, 
                'name' => 'Pedro Souza', 
                'email' => 'Pedro@email.com', 
                'password' => password_hash('Senha456',PASSWORD_DEFAULT)
            ]
        ];
    }
    
     private function isEmailValid(string $email): bool
     {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
     }

     private function isPasswordStrong(string $password): bool
     {
        return strlen($password) >= 8
        && preg_match('/[A-Z]/', $password)
        && preg_match('/[0-9]/', $password);
     }

     private function findUserByEmail(string $email): ?array
     {
        foreach ($this-> users as $user ) {
            if ($user['email'] === $email) {
                return $user;
            }
        }
        return null;
     }


    public function register(string $name, string $email, string $password): string
    {
        if (!$this->isEmailValid($email)) {
            return 'E-mail inválido.';
        }

        if (!$this->isPasswordStrong($password)) {
            return 'Senha fraca.<br>A senha deve conter no mínimo 8 caracteres, pelo menos 1 letra maiúscula e 1 número';
        }

        if ($this->findUserByEmail($email)) {
            return 'E-mail já foi cadastrado.';
        }

        $id = count($this->users) + 1;
        $this->users[] = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        return 'Usuário foi cadastrado com sucesso.';
    }


    public function login(string $email, string $password): string
    {
        $user = $this->findUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            return "Login realizado com sucesso!<br>Olá, {$user['name']}, seja bem-vindo! ";
        }

        return 'Login inválido.';
    }
}
?>