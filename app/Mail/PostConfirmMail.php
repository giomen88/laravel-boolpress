<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    private $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->post;
        return $this->view('mails.posts.confirm', compact('post'));
    }
}
