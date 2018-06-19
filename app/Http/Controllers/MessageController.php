<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Friend;
use Auth;
use Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transmitted=Message::select('id')->where('transmitter_id',Auth::id())->get();
        $received=Message::select('id')->where('receiver_id',Auth::id())->get();
        $aux=Message::select('id','receiver_id as user_id','text','checked','created_at')->where('transmitter_id',Auth::id());
        $messages=Message::select('id','transmitter_id as user_id','text','checked','created_at')->where('receiver_id',Auth::id())->union($aux)->orderByRaw('created_at')->get();
        return ['transmitted' => $transmitted, 'received' => $received, 'messages' => $messages];
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
        $messageToFriend=Friend::select('user_id')->where('user_id',Auth::id())->where('friend_id',$request->send_to_id)->get();
        if (!($messageToFriend->isEmpty())||strlen($request->text)>0||strlen($request->text)<=1024) {
            $carbon=new Carbon();
            $message=new Message();
            $message->transmitter_id=Auth::id();
            $message->receiver_id=$request->send_to_id;
            $message->text=$request->text;
            $message->created_at=$carbon->format('Y-m-d H:i:s');
            $message->save();
            return ['status_code' => 200];
        }
        return ['status_code' => 400];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
