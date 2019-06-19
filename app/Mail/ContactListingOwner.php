<?php

namespace App\Mail;

use App\{User, Listing};
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactListingOwner extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user;
    public $listing;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Listing $listing, $body)
    {
        $this->user = $user;
        $this->listing = $listing;
        $this->body = $body;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.listings.contact.message')
            ->subject("{$this->user->name} sent a message about {$this->listing->title}")
            ->from('support@classy.com')
            ->replyTo($this->user->email);
    }
}
