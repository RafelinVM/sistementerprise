<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function send(){

        $user = User::all();

        foreach($user as $user) {
            Mail::to($user->email)
        ->send(new TestMail('Test Email', 'Content', 'Ini adalah isi kontennya'));

        return 'OK';
    }

        }

        
    
}