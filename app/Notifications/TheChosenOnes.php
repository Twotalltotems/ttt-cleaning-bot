<?php

namespace App\Notifications;

use App\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class TheChosenOnes extends Notification
{
    use Queueable;

    /**
     * @var $employee1
     */
    public $employee1;

    /**
     * @var $employee2
     */
    public $employee2;


    /**
     * Create a new notification instance.
     *
     * @param Employee $employee1
     * @param Employee $employee2
     */
    public function __construct(Employee $employee1, Employee $employee2)
    {
        $this->employee1 = $employee1;
        $this->employee2 = $employee2;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from('TTT Ghost', ':ghost:')
            ->to('#general')
            ->content('Our cleaners this week are: ' . $this->employee1->name . ' and ' . $this->employee2->name . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
