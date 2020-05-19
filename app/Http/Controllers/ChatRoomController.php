<?php

namespace App\Http\Controllers;

use App\ChatRoom;
use App\Http\Requests\ChatRoomsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatRoomController extends Controller
{
    public function __construct(){
        $this->abilityCRUD('chatroom');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chatroom.index')->with(['chatrooms'=>ChatRoom::paginate(14)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chatroom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChatRoomsRequest  $request
     * @return \Illuminate\Http\Responsecd n
     */
    public function store(ChatRoomsRequest $request)
    {
       // dd(request());
      ChatRoom::create($request->validated());
      session()->flash('info','Proceso ejecutado con exito');
      return redirect()->route('chatrooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ChatRoom $chatRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatRoom $chatRoom)
    {
        return view('chatroom.edit', compact('chatRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
   //  * @param  ChatRoomsRequest  $request
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function update(ChatRoomsRequest $request, ChatRoom $chatRoom)
    {
        $chatRoom->fill($request->validated());
        $chatRoom->save();
         session()->flash('info','Proceso ejecutado con exito');
        return redirect()->route('chatrooms.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatRoom $chatRoom)
    {
        $image = $chatRoom->path_image;
        $chatRoom->delete();
        Storage::disk('public')->delete($image);
        session()->flash('info','Proceso ejecutado con exito');
        return redirect()->route('chatrooms.index');
    }
}
