<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Document;
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
        return Event::orderBy('id', 'desc')->get();
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
        $this->validate($request, [
            'eventName' => 'required',
            'venue' => 'required',
            'eventType' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        $event = Event::create([
            'eventName' => $request['eventName'],
            'venue' => $request['venue'],
            'date' => $request['date'],
            'eventType' => $request['eventType'],
            'description' => $request['description'],
            // 'user_id' => $user->id
        ]);


        return $event;
    }

    public function updateEvent(Request $request){
        $this->validate($request, [
            'eventName' => 'required',
            'venue' => 'required',
            'eventType' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'eventName' => $request['eventName'],
            'venue' => $request['venue'],
            'eventType' => $request['eventType'],
            'date' => $request['date'],
            'description' => $request['description']
        ];

        $event = Event::where('id', $request->id)->update($data);
        return $event;
    }
    public function deleteEvent(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);
        return Event::where('id', $request->id)->delete();
        return ['message' => 'Event deleted Successfully'];
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

    // Document Section

    public function getDocument() {
        return Document::orderBy('id', 'desc')->get();
    }

    public function createDocument(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required',
            'subject' => 'required',
            'status' => 'required',
            'years' => 'required',
            'remarks' => 'required',
            'documentType' => 'required',
            'document' => 'required',
        ]);
        $data = [
            'name' => $request['name'],
            'documentType' => $request['documentType'],
            'document' => $request['document'],
            'country' => $request['country'],
            'subject' => $request['subject'],
            'status' => $request['status'],
            'remarks' => $request['remarks'],
            'years' => $request['years'],
        ];

        $document = Document::create($data);
        return $document;
    }

    public function editDocument(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required',
            'subject' => 'required',
            'status' => 'required',
            'years' => 'required',
            'remarks' => 'required',
            'documentType' => 'required',
            'document' => 'required',
        ]);
        $data = [
            'name' => $request['name'],
            'documentType' => $request['documentType'],
            'document' => $request['document'],
            'country' => $request['country'],
            'subject' => $request['subject'],
            'status' => $request['status'],
            'remarks' => $request['remarks'],
            'years' => $request['years'],
        ];
        $document = Document::where('id', $request->id)->update($data);
        return $document;
    }

    public function uploadDocument(Request $request) {
        $this->validate($request, [
            'file' => 'required|mimes:jpeg,png,bimp,pdf',
        ]);
        $documentName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $documentName);
        return $documentName;
    }

    public function deleteDocument(Request $request){
         $this->validate($request, [
            'id' => 'required',
        ]);
        $fileName = $request->imageName;
        $filePath = public_path().'/uploads/'.$fileName;
        if (file_exists($filePath)) {
            @unlink($filePath);
        }
        return Document::where('id', $request->id)->delete();
        return ['message' => 'User deleted Successfully'];
    }

    public function deleteFile(Request $request){
        $fileName = $request->imageName;
        $this->deleteFileFromServer($fileName);
        return 'done';
    }

    public function deleteFileFromServer($fileName){
        $filePath = public_path().'/uploads/'.$fileName;
        if (file_exists($filePath)) {
            @unlink($filePath);
        }
        return;
    }

}