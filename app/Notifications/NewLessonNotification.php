<?php

namespace App\Notifications;

use App\Models\Lesson;
use App\Models\Tranier;
use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLessonNotification extends Notification
{
    use Queueable;
    
    protected $lesson;
    protected $tranier;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson , Tranier $tranier)
    {
        $this->lesson =$lesson;
        $this->tranier =$tranier;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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

    public function toDatabase($notifiable){

        $body= sprintf('A %s has been uploaded by %s',
            $this->lesson->name,
            $this->tranier->name,
        );
        return[
            'title' => 'New Lesson',
            'body' => $body,
            'icon' => 'fa fa-bell',
            'url' => route('lesson.show' , $this->lesson->id),
        ];
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
