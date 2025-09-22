<?php
Class UserSystem 
{
    private $users= [];


    public function __construct()
    {
        $this->users = [
            ['id' => 1, 
            'name' => 'João Silva', 
            'email' => 'Joao@email.com', 
            'password' => 'SenhaForte1'],

            ['id' => 2, 
            'name' => 'Maria Oliveira', 
            'email' => 'Maria@email.com', 
            'password' => 'Senha123'],

            ['id' => 3, 
            'name' => 'Pedro Souza', 
            'email' => 'Pedro@email.com', 
            'password' => 'Senha456']

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
}
?>