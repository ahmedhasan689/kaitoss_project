<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;

class SendEmailsController extends Controller
{
    public function send()
    {
        SendMailJob::dispatch()->onQueue('mail')->onConnection('database');
        return 'Done !';
    }
}
