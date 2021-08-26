<?php

namespace App\Core\Infrastructure\Notification\SendNotificationEmil;


use App\Core\Infrastructure\Notification\NotificationEmil;

interface SendNotificationEmilInterface
{
    public function send(NotificationEmil $emil): void;
}