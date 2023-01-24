<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();

        return view('dashboard.admins.index', compact('admins'));
    }

    public function send()
    {
        // There Is A Queue Name ( Mail ) , Store Queue In Database, Just Run " php artisan queue:work "
        /**
         * ? There Is A Queue Name ( Mail )
         * ? Store Queue In Database
         * ? NO Waiting In This Case
         * ? Just Run " php artisan queue:work "
         */
        SendMailJob::dispatch()->onQueue('mail')->onConnection('database');
        return 'Done !';
    }
}
