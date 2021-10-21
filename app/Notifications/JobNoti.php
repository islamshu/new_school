<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Job ;
class JobNoti extends Notification
{
    use Queueable;
        private $job;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Job $job )
    {
               $this->job = $job;

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
            'id'=>$this->job->id,
            'title'=>'تم تقديم طلب توظيف',
            'url'=>'job_app/'.$this->job->id,

            
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

