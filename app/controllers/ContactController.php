<?php

namespace App\Controllers;

use App\Models\ContactMessage;

class ContactController extends Controller
{
    private $contactMessage;

    public function __construct()
    {
        parent::__construct();
        $this->contactMessage = new ContactMessage();
    }

    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('/contact');
        }

        // Validate input
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        $errors = [];

        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Valid email is required';
        }

        if (empty($subject)) {
            $errors['subject'] = 'Subject is required';
        }

        if (empty($message)) {
            $errors['message'] = 'Message is required';
        }

        if (!empty($errors)) {
            $_SESSION['contact_errors'] = $errors;
            $_SESSION['contact_old'] = [
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            ];
            return $this->redirect('/contact');
        }

        try {
            // Save message to database
            $messageData = [
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            ];

            $this->contactMessage->create($messageData);

            // Send email notification
            $this->sendEmailNotification($messageData);

            $_SESSION['success'] = 'Thank you for your message! I will get back to you soon.';
            return $this->redirect('/contact');
        } catch (\Exception $e) {
            $_SESSION['error'] = 'Sorry, there was an error sending your message. Please try again later.';
            return $this->redirect('/contact');
        }
    }

    private function sendEmailNotification($data)
    {
        $to = getenv('ADMIN_EMAIL');
        $subject = "New Contact Form Submission: {$data['subject']}";
        
        $message = "You have received a new message from your portfolio website.\n\n";
        $message .= "Name: {$data['name']}\n";
        $message .= "Email: {$data['email']}\n";
        $message .= "Subject: {$data['subject']}\n\n";
        $message .= "Message:\n{$data['message']}\n";
        
        $headers = [
            'From' => $data['email'],
            'Reply-To' => $data['email'],
            'X-Mailer' => 'PHP/' . phpversion()
        ];

        mail($to, $subject, $message, $headers);
    }
} 