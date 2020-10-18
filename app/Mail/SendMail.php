<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        if ($this->details['foto'] == null) {
            return $this->subject('Atenttion')
                ->view('admin/page/fileEmail/mail');
        } else {
            return $this->subject('Atenttion')
                ->view('admin/page/fileEmail/mail')->attach($this->details['foto']->getRealPath(), [
                    'as' => $this->details['foto']->getClientOriginalName()
                ]);
        }
        //view bermaksu untuk template mail nyaa
    }
}
