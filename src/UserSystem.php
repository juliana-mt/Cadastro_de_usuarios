<?php
Class UserSystem 
{
    public $user;
    public $users= [];


    public function __construct()
    {
        $this->user = [
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

     public function validateUser(string $email): ?array
    {
        foreach ($this->users as $u) {
            if ($u['email'] === $email) {
                return $u;
            }
        }
        return null;
    }
}
?>