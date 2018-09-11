<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Partner;
use Validator;

class HomeController extends Controller
{
    public function index()
    {
        $partnerData = Partner::orderBy('id', 'desc')->get();

        return view('newmonual')->with('partners', $partnerData);
    }
}
