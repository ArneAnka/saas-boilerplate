<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImpersonateStartRequest;

class ImpersonateController extends Controller
{
    public function index(){
        return view('admin.impersonate.index');
    }

    public function store(ImpersonateStartRequest $request){
        $user = User::where('email', $request->get('email'))->first();
        session()->put('impersonate', $user->id);
        return redirect('/')->withSuccess("You are now impersonationg {$user->firstname}, {$user->lastname}");
    }

    public function destroy(){
        session()->forget('impersonate');
        return redirect()->route('admin.index')->withSuccess('You have stopped impersonating');
    }
}
