<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;
use App\FriendRequest;
use Auth;
use Carbon\Carbon;

class FriendRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friendRequests=FriendRequest::select('id','transmitter_id','created_at')->where('receiver_id',Auth::id())->orderByRaw('created_at')->get();
        return ['friendRequests' => $friendRequests];
    }
    
    public function getNewFriendRequests()
    {
        $friendRequests=FriendRequest::select('id')->where('receiver_id',Auth::id())->where('checked',0)->count();
        return ['newFriendRequests' => $friendRequests];
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
        $userExists=User::select('id')->where('id',$request->user_id)->get();
        $friendExists=Friend::select('user_id')->where('user_id',Auth::id())->where('friend_id',$request->user_id)->get();
        $requestToFriend=FriendRequest::select('id')->where('transmitter_id',Auth::id())->where('receiver_id',$request->user_id)->get();
        $requestFromFriend=FriendRequest::select('id')->where('receiver_id',Auth::id())->where('transmitter_id',$request->user_id)->get();
        if (!($requestFromFriend->isEmpty())&&$friendExists->isEmpty()&&!($userExists->isEmpty())) {
            $carbon=new Carbon();
            $friend1=new Friend();
            $friend1->user_id=Auth::id();
            $friend1->friend_id=$request->user_id;
            $friend1->created_at=$carbon->format('Y-m-d H:i:s');
            $friend1->save();
            $friend2=new Friend();
            $friend2->user_id=$request->user_id;
            $friend2->friend_id=Auth::id();
            $friend2->created_at=$carbon->format('Y-m-d H:i:s');
            $friend2->save();
            FriendRequest::where('receiver_id',Auth::id())->where('transmitter_id',$request->user_id)->delete();
            return ['status_code' => 200];
        }
        if ($requestToFriend->isEmpty()&&$friendExists->isEmpty()&&!($userExists->isEmpty())) {
            $carbon=new Carbon();
            $friendRequest=new FriendRequest();
            $friendRequest->transmitter_id=Auth::id();
            $friendRequest->receiver_id=$request->user_id;
            $friendRequest->created_at=$carbon->format('Y-m-d H:i:s');
            $friendRequest->save();
            return ['status_code' => 200];
        }
        return ['status_code' => 400];
    }
    
    /*public function acceptFriendRequest(Request $request)
    {
        $user=FriendRequest::select('transmitter_id')->where('id',$request->id)->get();
        echo dd($user);
        if (!($user->isEmpty())) {
            $carbon=new Carbon();
            $friend1=new Friend();
            friend1->user_id=Auth::id();
            $friend1->friend_id=$user;
            $friend1->created_at=$carbon->format('Y-m-d H:i:s');
            //$friend1->save();
            //$friend2=new Friend();
            //$friend2->user_id=$user;
            //$friend2->friend_id=Auth::id();
            //$friend2->created_at=$carbon->format('Y-m-d H:i:s');
            //$friend2->save();
            //FriendRequest::where('receiver_id',Auth::id())->where('transmitter_id',$user)->delete();
            
            /*$servername = env('DB_HOST');
            $username = env('DB_USERNAME');
            $password = env('DB_PASSWORD');
            $dbname = env('DB_DATABASE');

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO friends (user_id, friend_id, created_at)
            VALUES (".Auth::id().",".$user->transmitter_id.",".$carbon->format('Y-m-d H:i:s').")";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            return ['status_code' => 200];
        }
        return ['status_code' => 400];
    }*/
    
    /*public function declineFriendRequest(Request $request)
    {
        
    }*/

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
    
    public function checkFriendRequests(Request $request)
    {
        FriendRequest::where('receiver_id',Auth::id())->where('checked',0)->update(['checked' => 1]);
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
