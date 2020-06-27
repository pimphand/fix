<?php

namespace App\Http\Controllers;

use App\Model\ChatRoom;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChatRoomController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Factory|View
   */
  public function index()
  {
    $data = User::where('status', 0)->where('delete', 0);
    if (Auth::user()->role == 3) {
      $user = $data->where('role', 1)->get();
    } else {
      $user = $data->where('role', 3)->get();
    }

    $data = [
      'user' => $user
    ];

    return view('chat.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param ChatRoom $chatRoom
   * @return Response
   */
  public function show(ChatRoom $chatRoom)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param ChatRoom $chatRoom
   * @return Response
   */
  public function edit(ChatRoom $chatRoom)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param ChatRoom $chatRoom
   * @return Response
   */
  public function update(Request $request, ChatRoom $chatRoom)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param ChatRoom $chatRoom
   * @return Response
   */
  public function destroy(ChatRoom $chatRoom)
  {
    //
  }
}
