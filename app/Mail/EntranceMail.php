<?php
  
namespace App\Mail;
   
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
  
class EntranceMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
    public $pdf;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $pdf)
    {
        $this->details = $details;
        $this->pdf = $pdf;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        return $this->subject('Research and Development <no-reply@bput.ac.in>')
                    ->view('emails.entrance_mail')->attachData($this->pdf->output(), 'entrance_application.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
