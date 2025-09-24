<?php

class Validator
{
    public static function isEmailValid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isPasswordStrong(string $password): bool
    {
        return strlen($password) >= 8
            && preg_match('/[A-Z]/', $password)
            && preg_match('/[0-9]/', $password);
    }
}

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
    }
}

class UserSystem
{
    private array $users = [];

    public function __construct()
    {
        $this->users = [
            new User(1, 'João Silva', 'Joao@email.com', password_hash('SenhaForte1', PASSWORD_DEFAULT)),
            new User(2, 'Maria Oliveira', 'Maria@email.com', password_hash('Senha123', PASSWORD_DEFAULT)),
            new User(3, 'Pedro Souza', 'Pedro@email.com', password_hash('Senha456', PASSWORD_DEFAULT)),
        ];
    }

    private function findUserByEmail(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->email === $email) {
                return $user;
            }
        }
        return null;
    }

    public function register(string $name, string $email, string $password): string
    {
        if (!Validator::isEmailValid($email)) {
            return 'E-mail inválido.';
        }

        if (!Validator::isPasswordStrong($password)) {
            return 'Senha fraca. A senha deve conter no mínimo 8 caracteres, pelo menos 1 letra maiúscula e 1 número';
        }

        if ($this->findUserByEmail($email)) {
            return 'E-mail já foi cadastrado.';
        }

        $id = count($this->users) + 1;
        $this->users[] = new User(
            $id,
            $name,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        );

        return 'Usuário foi cadastrado com sucesso.';
    }

    public function login(string $email, string $password): string
    {
        $user = $this->findUserByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            return "Login realizado com sucesso!<br>Olá, {$user->name}, seja bem-vindo!";
        }

        return 'Login inválido.';
    }

    public function resetPassword(int $id, string $newPassword): string
    {
        if (!Validator::isPasswordStrong($newPassword)) {
            return 'Senha fraca';
        }

        foreach ($this->users as $user) {
            if ($user->id === $id) {
                $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
                return 'Senha alterada com sucesso';
            }
        }

        return 'Usuário não encontrado';
    }
}
