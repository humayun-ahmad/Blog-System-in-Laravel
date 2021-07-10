<?php

namespace App\Http\Controllers;

//use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => "required|email|unique:subscribers",
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        Toastr::success("you successfully added to our subscriber list!", "success");

        return redirect()->back();
    }
}
