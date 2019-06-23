<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Account\PasswordUpdated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Account\PasswordStoreRequest;

class PasswordController extends Controller
{
    public function index(){
        return view('account.password.index');
    }

    public function store(PasswordStoreRequest $request){
        $request->user()->update([
            'password' => bcrypt($request->get('password'))
        ]);

        Mail::to($request->user())->send(new PasswordUpdated());

        return redirect()->route('account.index')->withSuccess('Password updated');;
    }
}
