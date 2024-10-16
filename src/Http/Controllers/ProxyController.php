<?php

namespace OITDevelopmentTeam\LaravelUserProxy\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ProxyController extends Controller
{
   

    public function index()
    {
        Log::info('The index method was called from the ProxyController.');
        return view('laravel-user-proxy::laravel-user-proxy.index');
    }



}
