<?php

namespace App\Http\Controllers;

use App\Sent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        if(isAuthenticated()) {
            return view('dashboard.sent.index', ['sentMails'=>Sent::all()]);
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $user
     * @return void
     */
    public function store(Request $request)
    {
        $user = User::where('email', session('email'))->get()->first();
//        $password = $user->password;
//        $fromEmail = $request->get('fromEmail');
//        $to = $request->get('to');
//        $subject = $request->get('subject');
//        $body = $request->get('body');
//
//
//        config('MAIL_USERNAME', $fromEmail);
//        config('MAIL_PASSWORD', $password);
//
//        Mail::raw($body, function ($message) use ($fromEmail, $to, $subject) {
//            $message->from($fromEmail);
//            $message->subject($subject);
//            $message->to($to);
//
//        });


        Sent::create([
            'to' => request('to'),
            'subject' => request('subject'),
            'body' => request('body'),
            'user_id'  => $user->id
        ]);

        return redirect('/dashboard/compose')->with('Email sent successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Sent $sent
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sent $sent, $id)
    {
        //
        $sent = Sent::findOrFail($id);
        if(isAuthenticated()) {
            return view('dashboard.sent.email', ['sent'=>$sent]);
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function edit(Sent $sent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sent $sent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Sent $sent
     * @param $id
     * @return void
     */
    public function destroy(Sent $sent)
    {
        //
        $id = \request()->get('id');
        $sent = Sent::findOrFail($id);
        $sent->delete();

        return redirect('/dashboard/sent');
    }
}
