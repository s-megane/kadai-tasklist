<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    public function destroy($id)
    {
       $user = User::findOrFail($id);
       \Auth::logout();
       $user->delete();
       return redirect("/");
    }
}
