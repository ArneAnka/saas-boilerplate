<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileStoreRequest;

class ProfileController extends Controller
{
    public function index(){
        return view('account.profile.index');
    }

    public function store(ProfileStoreRequest $request){
        $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
            ]);

        $request->user()->update($request->only(['firstname', 'lastname', 'email']));

        return back()->withSuccess('Account was successfully updated');
    }
}
