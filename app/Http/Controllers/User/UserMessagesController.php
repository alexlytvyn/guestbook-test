<?php

namespace App\Http\Controllers\User;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMessagesController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.messages.index', [
            'messages' => Message::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.messages.create', [
            'message' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter correct email.',
            'message_text.required' => 'Please enter your message.',
        ];

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message_text' => 'required',
        ], $messages);
        
        Message::create($request->all());
        
        $request->session()->flash('alert-success', 'Message was added successfully!');
        
        return redirect()->route('user.message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('user.messages.show', [
            'message' => $message
        ]);
    }
}
