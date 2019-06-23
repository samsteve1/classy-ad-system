<?php

namespace App\Mail;

use App\{Listing, User};
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListingShare extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $listing;
    public $sender;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Listing $listing, User $sender, $body = null)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.listings.shared.share')
            ->subject("{$this->sender->name} shared a listing with you.")
            ->from('hello@classy.com');
    }
}
