<?php


namespace App\Services;
use MailchimpMarketing\ApiClient

class Newsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),   // Extract The api key
            'server' => 'us17'
        ]);

        return $mailchimp->lists->addListMember('a4f82592d4',[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);

    }
}
