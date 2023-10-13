<?php

namespace notification;

class NotificationTemplateService
{
    public function __construct(
        private NotificationTemplateRepository $templateRepository
    ){}

    public function getTemplate($event)
    {
        $templateData = $this->templateRepository->getTemplate($event);
        return new Template($templateData);
    }
}