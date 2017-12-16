<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Chat;

class ChatController extends Controller 
{

  public function index()
  {
    $users = User::where('role', User::USER)->get();
    
    return view('chat.index', compact('users'));
  }

  public function chat(User $user)
  {
    $chats = $this->getChats($user->id);
    return view('chat.conversation', compact('chats', 'user'));
  }

  public function getChats($id)
  {
    $chats = Chat::where('sender_id', auth()->user()->id)
                ->orWhere('sender_id', $id)
                ->orWhere('receiver_id', auth()->user()->id)
                ->orWhere('receiver_id', $id)
                ->get();

    return $chats;
  }

  public function chatWithAdmin()
  {
    $chats = Chat::where('sender_id', auth()->user()->id)
                  ->orWhere('sender_id', User::ADMIN)
                  ->orWhere('receiver_id', auth()->user()->id)
                  ->orWhere('receiver_id', User::ADMIN)
                  ->get();

    return $chats;
  }

  public function chatUser()
  {
    $user = auth()->user();
    $chats = Chat::where('sender_id', auth()->user()->id)
                  ->orWhere('sender_id', User::ADMIN)
                  ->orWhere('receiver_id', auth()->user()->id)
                  ->orWhere('receiver_id', User::ADMIN)
                  ->get();
    return view('chat.conversation_user', compact('user', 'chats'));
  }

  public function store(Request $request) 
  {
    $chat = new Chat;
    $chat->sender_id = auth()->user()->id;
    $chat->receiver_id = $request->receiver_id;
    $chat->content = $request->content;
    $chat->save();

    return $this->getChats($request->receiver_id);
  }
}

?>