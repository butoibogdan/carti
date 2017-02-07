<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail extends Mailable {

    use Queueable,
        SerializesModels;

    protected $data;
    protected $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $type) {
        $this->data=$data;
        $this->type=$type;
               
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('FO.mail')
                ->with('conf', $this->data)
                ->with('type', $this->type);
    }

}
