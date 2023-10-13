<?php

namespace notification;


class UserNotifyService
{
    public function __construct(
        private NotificationTemplateService $templateService,
        private UserService $userService,
        private NotificationClient $client
    ){ }

    public function notify(int $userId, string $event)
    {
        match($event) {
            'registered' => $this->notifyRegistred($userId),
            default => throw new Exception('Notify handler not found')
        };
    }

    private function notifyRegistred(int $userId)
    {
        if ($user = $this->userService->getUser($userId) &&
            $template = $this->templateService->getTemplate('Welcome')
        ) {
            $userData = new UserNotificationData1($user);
            $text = $template->getText($userData);
            $this->client->send($user->mail, $text);

            if ($referal = $this->userService->getReferal($userId) &&
                $templateReferal = $this->templateService->getTemplate('')
            ) {
                $referalData = new UserNoficationData2($referal);
                $textReferal = $templateReferal->getText($referalData);
                $this->client->send($referal->mail, $textReferal);
            };
        }
    }
}