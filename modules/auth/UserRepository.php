<?php

class UserRepository
{
    public function userExists(?int $id = null, ?string $mail = null): bool
    {
        return (bool) User::where()->get();
    }

    public function saveUser(UserDTO $user): Object
    {
        $user = new User($user);
        $user->save();
        return $this->getUser($user->id);

    }

    public function getUser(int $userId): Object
    {
        return (object)['id' => $userId];
    }
}