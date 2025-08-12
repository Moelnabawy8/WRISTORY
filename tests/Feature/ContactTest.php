<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function test_contact_email_is_sent()
    {
       
        Mail::fake();

       
        $response = $this->postJson('/contact/send', [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'message' => 'Hello, this is a test.',
        ]);

        $response->assertStatus(200);

      
        Mail::assertSent(ContactMessage::class, function ($mail) {
            return $mail->data['message'] === 'Hello, this is a test.';
        });
    }
}
