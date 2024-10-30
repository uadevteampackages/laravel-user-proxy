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

        // Exit full proxy mode if it is active.
        session()->put('full_proxy_mode', false);
        session()->forget('full_proxy_mode');

        // Clear previous quick proxy session variables.
        $this->forgetQuickProxySessionVariables();

        // Enter quick proxy mode.
        session()->put('quick_proxy_mode', true);

        // Validate all key-value pairs.
        $data = $request->validate([
            'quick_proxy_session_key_1' => 'required|string',
            'quick_proxy_session_value_1' => 'required|string',
            'quick_proxy_session_key_2' => 'nullable|string',
            'quick_proxy_session_value_2' => 'nullable|string',
            'quick_proxy_session_key_3' => 'nullable|string',
            'quick_proxy_session_value_3' => 'nullable|string',
            'quick_proxy_session_key_4' => 'nullable|string',
            'quick_proxy_session_value_4' => 'nullable|string',
            'quick_proxy_session_key_5' => 'nullable|string',
            'quick_proxy_session_value_5' => 'nullable|string',
        ]);

        // Store each valid key-value pair in the session.
        for ($i = 1; $i <= 5; $i++) {
            $key = $data["quick_proxy_session_key_$i"] ?? null;
            $value = $data["quick_proxy_session_value_$i"] ?? null;

            if ($key && $value) {
                session()->put($key, $value); // Store the key-value in session.
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
        // Remove all session keys and values related to quick proxy mode.
        for ($i = 1; $i <= 5; $i++) {
            $key = session()->get("quick_proxy_session_key_$i");

            if ($key) {
                session()->forget($key); // Forget the dynamic session key.
            }

            session()->forget("quick_proxy_session_key_$i");
            session()->forget("quick_proxy_session_value_$i");
        }
    }
}
