<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notify extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Id of the post that's been liked or commented on
     * @var int
     */
    private $post;

    /**
     * User who liked or commented on the post
     * @var
     */
    private $actor;

    /**
     * Define what kind of work did the actor do with post
     * can be "LIKE" or "COMMENT"
     * @var string
     */
    private $work;

    /**
     * Create a new notification instance.
     *
     * @param  $actor
     * @param string $work comment on or like a post
     * @param int $post
     */
    public function __construct($actor, string $work, int $post)
    {
        $this->actor = User::find($actor);
        $this->work = $work;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
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
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->actor->name . " $this->work Your post",
            'post_id' => $this->post,
        ];
    }

}
