<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Student ;
class StudentNo extends Notification
{
    use Queueable;
        private $student;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Student $student )
    {
               $this->student = $student;

    }

  
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
    public function toDatabase()
    {
        return [
            'id'=>$this->student->id,
            'title'=>'تم تسجيل طالب جديد',
            'url'=>'studnets/'.$this->student->id,

            
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

