<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\TestMail;              //note
use Illuminate\Support\Facades\Mail;//note

class MailController extends Controller
{
    public function sendmail()
    {
        $mailData = [
            'title' => 'Tiêu đề',
            'body'  => 'Nội dung'
        ];

        Mail::to('tn2k2tb@gmail.com')->send(new TestMail($mailData));
    }
}
