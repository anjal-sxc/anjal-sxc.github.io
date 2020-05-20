<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\Sent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = session('user');
        $connection = imap_open('{imap.gmail.com:993/imap/ssl}INBOX', $user->email, $user->password)
        or die('Cannot connect to Gmail: ' . imap_last_error());
        $emailData = imap_search($connection, 'SUBJECT "VMail - " UNSEEN');

        if (!empty($emailData)) {
            foreach ($emailData as $emailIdent) {

                $overview = imap_fetch_overview($connection, $emailIdent, 0);
                $from = $overview[0]->from;
                $subject = $overview[0]->subject;
                $body = imap_fetchbody($connection, $emailIdent, "1.1");

                if ($body == "") {
                    $body = imap_fetchbody($connection, $emailIdent, "1");
                }

                $body = quoted_printable_decode($body);

                Inbox::create([
                   'from' => $from,
                   'subject' => $subject,
                   'body' => $body,
                    'user_id' => $user->id,
                ]);

                } // End foreach

        } // End if

        $inboxMails = Inbox::all();
        if(isAuthenticated()) {
            return view('dashboard.inbox.index', ['inboxMails'=>$inboxMails]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Inbox $inbox
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox, $id)
    {
        //
        $inbox = Inbox::findOrFail($id);
        if(isAuthenticated()) {
            return view('dashboard.inbox.email', ['inbox'=>$inbox]);
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
        //
        $id = \request()->get('id');
        $inbox = Inbox::findOrFail($id);
        $inbox->delete();

        return redirect('/dashboard/inbox');
    }
}
