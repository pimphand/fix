<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
  public function online()
  {
    return response()->json(['response' => Auth::user()->isOnline()], 200);
  }

  public function list()
  {
    $count = 0;
    $online = 0;
    $offline = 0;
    $user = User::all();
    foreach ($user as $item) {
      if ($item->isOnline()) {
        $online++;
      } else {
        $offline++;
      }
      $count++;
      foreach ($item->tokens as $subItem) {
        if (!$item->isOnline()) {
          if ($subItem->revoked == 0) {
            $online++;
            $offline--;
          } else {
            $online--;
            $offline++;
          }
        }
      }
    }

    $data = [
      'count' => $count,
      'online' => $online,
      'offline' => $offline,
    ];

    return response()->json($data, 200);
  }
}
