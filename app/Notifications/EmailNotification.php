<?php

namespace App\Notifications;

use App\Models\DisplayNode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;
    public $emailMessage;
    public $emailSubject;
    public $nodeID;
    public $sender;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $emailSubject,string $emailMessage, string $nodeID,User $sender)
    {
        $this->emailMessage = $emailMessage;
        $this->emailSubject = $emailSubject;
        $this->nodeID = $nodeID;
        $this->sender = $sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject($this->emailSubject." ".$this->nodeID)
                    ->greeting('Hi there, ')
                    ->from($this->sender['email'], $this->sender['name'])
                    ->line('This is an automatic notification email. The following action has taken place: '. $this->emailMessage)
                    ->salutation($this->sender['name'])
                    ->action('Wiki', url('http://display_system.test/Documentation'));

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
