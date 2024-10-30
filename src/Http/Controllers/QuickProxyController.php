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

        $data = $request->validate([
            'quick_proxy_session_key_1' => ['nullable', 'string', 'different:quick_proxy_session_key_2,quick_proxy_session_key_3,quick_proxy_session_key_4,quick_proxy_session_key_5'],
            'quick_proxy_session_key_2' => ['nullable', 'string', 'different:quick_proxy_session_key_1,quick_proxy_session_key_3,quick_proxy_session_key_4,quick_proxy_session_key_5'],
            'quick_proxy_session_key_3' => ['nullable', 'string', 'different:quick_proxy_session_key_1,quick_proxy_session_key_2,quick_proxy_session_key_4,quick_proxy_session_key_5'],
            'quick_proxy_session_key_4' => ['nullable', 'string', 'different:quick_proxy_session_key_1,quick_proxy_session_key_2,quick_proxy_session_key_3,quick_proxy_session_key_5'],
            'quick_proxy_session_key_5' => ['nullable', 'string', 'different:quick_proxy_session_key_1,quick_proxy_session_key_2,quick_proxy_session_key_3,quick_proxy_session_key_4'],
        
            'quick_proxy_session_value_1' => ['nullable', 'string'],
            'quick_proxy_session_value_2' => ['nullable', 'string'],
            'quick_proxy_session_value_3' => ['nullable', 'string'],
            'quick_proxy_session_value_4' => ['nullable', 'string'],
            'quick_proxy_session_value_5' => ['nullable', 'string'],
        ],
        
        [
            'quick_proxy_session_key_1.different' => 'Each key must be unique.  Key 1 is not unique.', 
            'quick_proxy_session_key_2.different' => 'Each key must be unique.  Key 2 is not unique.',
            'quick_proxy_session_key_3.different' => 'Each key must be unique.  Key 3 is not unique.',
            'quick_proxy_session_key_4.different' => 'Each key must be unique.  Key 4 is not unique.',
            'quick_proxy_session_key_5.different' => 'Each key must be unique.  Key 5 is not unique.',
        ]);
        
       
        

        session()->put('full_proxy_mode', false);
        session()->forget('full_proxy_mode');

        $this->forgetQuickProxySessionVariables();

        session()->put('quick_proxy_mode', true);

        
        for ($i = 1; $i <= 5; $i++) {
            $key = $data["quick_proxy_session_key_$i"] ?? null;
            $value = $data["quick_proxy_session_value_$i"] ?? null;

            if ($key && $value) {
                session()->put($key, $value); 
                session()->put("quick_proxy_session_key_$i", $key);
                session()->put("quick_proxy_session_value_$i", $value);
            }
        }

        return redirect()->to('/laravel-user-proxy');
    }



    public function exitQuickProxyMode()
    {
        Log::info('The exitQuickProxyMode method was called from the QuickProxyController.');

        session()->put('quick_proxy_mode', false);
        session()->forget('quick_proxy_mode');

        $this->forgetQuickProxySessionVariables();

        return redirect()->to('/laravel-user-proxy');
    }



    public function forgetQuickProxySessionVariables()
    {

        for ($i = 1; $i <= 5; $i++) {
            $key = session()->get("quick_proxy_session_key_$i");

            if ($key) {
                session()->forget($key); 
            }

            session()->forget("quick_proxy_session_key_$i");
            session()->forget("quick_proxy_session_value_$i");
        }
    }
}
