<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\CourseStudent ;
class CourseNot extends Notification
{
    use Queueable;
        private $co;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CourseStudent $co )
    {
               $this->co = $co;

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
            'id'=>$this->co->id,
            'title'=>'تم تقديم طلب دورة',
            'url'=>'/admin/student_course/'.$this->co->id,

            
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

