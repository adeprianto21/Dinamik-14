<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SwarakaraTicket extends Mailable
{
    use Queueable, SerializesModels;

    private $participant;
    private $file_name;

    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($participant, $file_name)
    {
        $this->participant = $participant;
        $this->file_name = $file_name;
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        return $this->subject('Dinamik 14 - SWARAKARA E-Ticket')->from('dinamik@gmail.com', 'Dinamik
        14')->view('templates.email.eticket-fest-music', ['participant' =>
        $this->participant])->attach('resources/pdf-music/'.$this->file_name);
    }
}
