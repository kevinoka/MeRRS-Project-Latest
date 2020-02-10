<?php

namespace MeRRS\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserApprovedRequest extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from('operation@idxsti.co.id', 'MeRRS')
                    ->subject('Meeting Room Request Confirmation')
                    ->greeting('Hello, ' . $this->data->user->name )
                    ->line('The request you submitted has been approved.')
                    ->line('Meeting title   : ' . $this->data->title)
                    ->line('Start date/time : ' . $this->data->start)
                    ->line('End date/time   : ' . $this->data->end)
                    ->line('Room            : ' . $this->data->room)
                    ->line('Num. of Person  : ' . $this->data->personNum)
                    ->line('Description     : ' . $this->data->description)
                    ->action('View your request', url(route('member.requestpage.index',$this->data->id)))
                    ->line('Thank you');
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
