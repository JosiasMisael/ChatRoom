<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function role()
    {
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        $moderator = Bouncer::role()->firstOrCreate([
            'name' => 'moderator',
            'title' => 'Moderador',
        ]);

        $createCharRoom= Bouncer::ability()->firstOrCreate([
            'name' => 'Create-ChatRoom',
            'title' => 'Create Chatroom',
        ]);
        $editChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'Edit-ChatRoom',
            'title' => 'Edit Chatroom',
        ]);
        $deleteChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'Delete-ChatRoom',
            'title' => 'Delete Chatroom',
        ]);

        $indexChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'Index-ChatRoom',
            'title' => 'Index Chatroom',
        ]);
        $asignaRol = Bouncer::ability()->firstOrCreate([
            'name' => 'asigna-rol',
            'title' => 'Asignar Rol',
        ]);

      //  Bouncer::allow($admin)->to($createCharRoom, $editChatRoom, $deleteChatRoom, $indexChatRoom );
          Bouncer::allow($admin)->to($createCharRoom);
          Bouncer::allow($admin)->to($editChatRoom);
          Bouncer::allow($admin)->to($deleteChatRoom);
          Bouncer::allow($admin)->to($indexChatRoom);
          Bouncer::allow($admin)->to($asignaRol);

          Bouncer::allow($moderator)->to($editChatRoom);
          Bouncer::allow($moderator)->to($indexChatRoom);

          (User::findOrFail(1))->assign('admin');
          (User::findOrFail(2))->assign('moderator');

          return redirect()->route('home');
    }



}
