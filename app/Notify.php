<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class Notify
{
    use Notifiable;

    /**
     * Route notifications from Slack
     *
     * @return string
     */
    public function routeNotificationForSlack() {
        return slack()->getWebhookUrl();
    }
}