<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $score;
    public $review;

    /**
     * Create a new message instance.
     *
     * @param  string  $name
     * @param  string  $email
     * @param  int  $score
     * @param  string  $review
     * @return void
     */
    public function __construct($name, $email, $score, $review)
    {
        $this->name = $name;
        $this->email = $email;
        $this->score = $score;
        $this->review = $review;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@test.be')
            ->replyTo('noreply@test.be')
            ->subject('We hebben uw review ontvangen')
            ->view('emails.review_confirmation')
            ->with([
                'data' => [
                    'name' => $this->name,
                    'email' => $this->email,
                    'score' => $this->score,
                    'review' => $this->review,
                ],
            ]);
    }
}
