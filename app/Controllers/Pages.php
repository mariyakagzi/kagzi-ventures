<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About Us - Kagzi Ventures',
        ];

        return view('about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us - Kagzi Ventures',
        ];

        return view('contact', $data);
    }

    public function sendContact()
    {
        $name    = trim($this->request->getPost('name'));
        $email   = trim($this->request->getPost('email'));
        $phone   = trim($this->request->getPost('phone'));
        $subject = trim($this->request->getPost('subject')) ?: 'General Enquiry';
        $message = trim($this->request->getPost('message'));

        $text = "*New Enquiry - Kagzi Ventures*\n\n"
              . "*Name:* " . $name . "\n"
              . "*Email:* " . $email . "\n"
              . (!empty($phone) ? "*Phone:* " . $phone . "\n" : "")
              . "*Subject:* " . $subject . "\n\n"
              . "*Message:*\n" . $message;

        $whatsappUrl = "https://wa.me/919753875213?text=" . urlencode($text);

        return redirect()->to($whatsappUrl);
    }
}
