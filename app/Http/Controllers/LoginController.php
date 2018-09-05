<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index() {

      return view('login');
    }

    public function submit(Request $request)
    {

      $username = $request->post('username');
      $password = $request->post('password');

      if( $username == 'monual' && $password == 'awesome')
      {
          return redirect('/admiin');
      } else {
          return redirect('/admin');
      }

    }
}
