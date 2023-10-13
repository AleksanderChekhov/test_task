<?php

class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function saveUser(UserDTO $data)
    {
        if ($this->userRepository->userExists(mail: $data->mail)) {
            throw new Exception();
        }

        if (!empty($data->referal_id) && !$this->userRepository->userExists(id: $data->id)) {
            throw new Exception();
        }

        return $this->userRepository->saveUser($data);
    }

    public function getUser(int $id)
    {
        return $this->userRepository->getUser($id);
    }
}