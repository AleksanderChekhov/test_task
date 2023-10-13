<?php

class UserRegister
{
    public function __construct(
        private UserService $userService,
        private UserNotifyService $notifyService,
        private StatisticService $statisticService
    ) {
    }

    public function handle(UserDTO $user)
    {
        $user = $this->userService->saveUser($user);
        if ($user) {
            $this->statisticService->updateStatistic(); // async
            $this->notifyService->notify($user->id, 'registered'); // async
        }
    }
}