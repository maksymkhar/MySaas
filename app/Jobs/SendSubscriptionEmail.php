<?php

namespace App\Jobs;


use App\Jobs\Job;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Illuminate\Http\Request;

class SendSubscriptionEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     *
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle()
    {

        Mail::raw('Text to e-mail', function ($message)  {
            $message->from($this->message['email'], 'My SaaS');
            $message->to("maksymkharuk@iesebre.com")->subject('Welcome!');

        });
    }
}
