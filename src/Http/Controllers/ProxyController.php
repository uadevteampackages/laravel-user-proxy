<?php

namespace Uadevteampackages\LaravelUserProxy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Uadevteampackages\LaravelUserProxy\Services\MsGraphApiService;

class ProxyController extends Controller
{
   

    public function index()
    {
        Log::info('The index method was called from the ProxyController.');
        return view('laravel-user-proxy::laravel-user-proxy.index');
    }



    public function searchForUser(Request $request)
    {
        Log::info('The searchForUser method was called from the ProxyController.');

        $data = $request->validate([
            'user_principal_name' => 'required'
        ], [
            'user_principal_name.required' => 'The userPrincipalName field is required.'
        ]);
        

        $user_principal_name = $data['user_principal_name'];

        $graphApiService = new MsGraphApiService();
        $user_from_entra = $graphApiService->getUserInfoByUserPrincipalName($user_principal_name);

        if ($user_from_entra == false) {

            return redirect()->back()->with('warning', 'The user was not found in Entra.');

        }

        return view('laravel-user-proxy::laravel-user-proxy.search-for-user-results', compact('user_from_entra'));
    }


    public function enterProxyMode(Request $request)
    {
        Log::info('The enterProxyMode method was called from the ProxyController.');

        // first we save the real user info before we switch to proxy mode
        $this->saveRealUserInfo();

        $this->flushAllSessionVarsExceptRealUserInfo();

        // enter proxy mode
        session()->put('proxy_mode', true);

        $data = $request->validate([
            'user_principal_name_to_proxy' => 'required'
        ]);

        $user_principal_name_to_proxy = $data['user_principal_name_to_proxy'];

        $graphApiService = new MsGraphApiService();
        $user_from_entra = $graphApiService->getUserInfoByUserPrincipalName($user_principal_name_to_proxy);

        $proxy_ms_user = (object) [
            'id' => $user_from_entra['id'],
            'name' => $user_from_entra['displayName'],
            'email' => $user_from_entra['mail'],
            'principalName' => $user_from_entra['userPrincipalName'],
            'bannerUsername' => explode('@', $user_from_entra['userPrincipalName'] ?? null)[0] ?? null,
        ];
    
        session()->put('ms:user', $proxy_ms_user);

        session()->put('ms:username', $proxy_ms_user->bannerUsername);
        session()->put('ms:email', $proxy_ms_user->email);
        session()->put('ms:principalName', $proxy_ms_user->principalName);
        session()->put('ms:id', $proxy_ms_user->id);

        return redirect()->to('/laravel-user-proxy');
    }



    public function exitProxyMode()
    {

        Log::info('The exitProxyMode method was called from the ProxyController.');

        session()->put('proxy_mode', false);

        session()->flush();

        return redirect(url('/logout'));
    }
    


    public function saveRealUserInfo()
    {
        Log::info('The saveRealUserInfo method was called from the ProxyController.');

        // if we are in proxy mode, do nothing, because we already have the real user info and don't want to overwrite it
        if (session('proxy_mode') == true) {

            return;
        }

        else {

            // save the current session ms:user info as real_ms_user
            session()->put('real_ms_username', session('ms:username'));
            session()->put('real_ms_id', session('ms:id'));
            session()->put('real_ms_name', session('ms:displayName'));
            session()->put('real_ms_email', session('ms:email'));
            session()->put('real_ms_principalName', session('ms:principalName'));
            session()->put('real_ms_token', session('ms:session-token'));
        }
    }



    public function flushAllSessionVarsExceptRealUserInfo()
    {
        Log::info('The flushAllSessionVarsExceptRealUserInfo method was called from the ProxyController.');

        // if we are already in proxy mode, do nothing, because we don't want to flush the real user info
        if (session('proxy_mode') == true) {

            return;

        }

        else {

            // store real user info session variables in standard variables because we are about to flush all the session variables
            $real_ms_username = session('ms:username');
            $real_ms_id = session('ms:id');
            $real_ms_name = session('ms:displayName');
            $real_ms_email = session('ms:email');
            $real_ms_principalName = session('ms:principalName');
            $real_ms_token = session('ms:session-token');
        

            // flush all session variables
            session()->flush();

            // restore real user info session variables
            session()->put('real_ms_username', $real_ms_username);
            session()->put('real_ms_id', $real_ms_id);
            session()->put('real_ms_name', $real_ms_name);
            session()->put('real_ms_email', $real_ms_email);
            session()->put('real_ms_principalName', $real_ms_principalName);
            session()->put('real_ms_token', $real_ms_token);

        }


    }

    
}
