<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email):? User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt -> execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if($user == false){
            return null;
        }
        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['username']
        );
    }

    public function saveUser(User $user): String
    {
        if(($this->getUser($user->getEmail()))!=null){
            return 'User already exists';
        }
        try {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users(username, email, password) VALUES (:username, :email, :password);
        ');
            $username = $user->getUsername();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            return 'User Created';
        } catch (PDOException $e) {
            return $e;
        }
    }
}