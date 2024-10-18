<?php

namespace Uadevteampackages\LaravelUserProxy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class QuickProxyController extends Controller
{

    
    public function consoleQuickProxy()
    {
        Log::info('The consoleQuickProxy method was called from the QuickProxyController.');
        return view('laravel-user-proxy::laravel-user-proxy.console-quick-proxy');
    }



    public function enterQuickProxyMode(Request $request)
    {
        Log::info('The enterQuickProxyMode method was called from the QuickProxyController.');

        // exit full proxy mode if it is active (we don't have to check whether it's active just delete the session variable)
        session()->put('full_proxy_mode', false);
        session()->forget('full_proxy_mode');

        // enter quick proxy mode
        session()->put('quick_proxy_mode', true);

        $data = $request->validate([
            'quick_proxy_session_key' => 'required',
            'quick_proxy_session_value' => 'required',
        ]);

        session()->put('quick_proxy_session_key', $data['quick_proxy_session_key']);
        session()->put('quick_proxy_session_value', $data['quick_proxy_session_value']);

        session()->put($data['quick_proxy_session_key'], $data['quick_proxy_session_value']);

        return redirect()->to('/laravel-user-proxy');
    }



    public function exitQuickProxyMode()
    {
        Log::info('The exitQuickProxyMode method was called from the QuickProxyController.');

        session()->put('quick_proxy_mode', false);
        session()->forget('quick_proxy_mode');

        // remove the quick proxy session key and value and the session variable that equals the quick proxy session key
        $quick_proxy_session_key = session()->get('quick_proxy_session_key');

        session()->forget($quick_proxy_session_key);
        session()->forget('quick_proxy_session_key');
        session()->forget('quick_proxy_session_value');

        return redirect()->to('/laravel-user-proxy');
    }
    

}
