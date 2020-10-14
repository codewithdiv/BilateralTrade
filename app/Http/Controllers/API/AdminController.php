<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // $user = Auth::user();
        // $this->validate($request, [
        //     'eventName' => 'required',
        //     'venue' => 'required',
        //     'eventType' => 'required',
        //     'date' => 'required',
        //     'description' => 'required'
        // ]);

        $data = request()->validate([
            'eventName' => 'required',
            'venue' => 'required',
            'eventType' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        // $data['user_id'] = auth()->user()->id;
        // $event = Event::create($data);

            $event = auth()->user()->event()->create($data);

            // 'eventName' => $request['eventName'],
            // 'venue' => $request['venue'],
            // 'date' => $request['date'],
            // 'eventType' => $request['eventType'],
            // 'description' => $request['description'],
            // // 'user_id' => $user->id

        return $event;
    }

    // User section

    public function getUsers(){
        return User::orderBy('id', 'desc')->get();
    }

    public function createUser(Request $request){
        $this->validate($request, [
            'name' => 'bail|required|min:3',
            'lastName' => 'bail|required|min:2',
            'email' => 'bail|email|required|unique:users',
            'password' => 'bail|required|min:6'
        ]);

        $password = bcrypt($request->password);
        $user = User::create([
            'name' => $request['name'],
            'lastName' => $request['lastName'],
            'password' => $password,
            'email' => $request['email'],
        ]);
        return $user;
    }

    public function edituser(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|min:3',
            'email' => "bail|required|email|unique:users,email,$request->id",
            'password' => 'min:6',
            'lastName' => 'bail|required|min:2',
        ]);
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'lastName' => $request['lastName'],
        ];
        if ($request->password) {
            $password = bcrypt($request->password);
            $data['password'] = $password;
        }
        $user = User::where('id', $request->id)->update($data);
        return $user;
    }

    public function deleteUser(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);
        return User::where('id', $request->id)->delete();
        return ['message' => 'User deleted Successfully'];
    }
}