<?php

namespace Uadevteampackages\LaravelUserProxy\Services;


class ShowHideLupService
{
    

    public $lup_allowed_usernames;
    public $app_env;




    public function __construct()
    {
        $this->lup_allowed_usernames = env('LUP_ALLOWED_USERNAMES');
        $this->app_env = env('APP_ENV');
    }


    public function handle()
    {
        if ($this->checkUser() == true && $this->checkAppEnvironment() == true) {
            return true;
        } else {
            return false;
        }
    }


    public function checkUser()
    {


        $lup_allowed_usernames = explode(',', env('LUP_ALLOWED_USERNAMES', ''));
        $lup_allowed_usernames = array_map('trim', $lup_allowed_usernames);



        if (session('full_proxy_mode') == true) {

            $real_ms_username = session('real_ms_username');
            if (in_array($real_ms_username, $lup_allowed_usernames)) {
                return true;
            }
        } 


        elseif (session('quick_proxy_mode') == true) {

            $username = session('ms:username');
            if (in_array($username, $lup_allowed_usernames)) {
                return true;

            }
        }

        
        elseif (session('full_proxy_mode') == false && session('quick_proxy_mode') == false) {
            
            $username = session('ms:username');
            if (in_array($username, $lup_allowed_usernames)) {
                return true;

            }
        }

        else {

            return false;

        }

    }


    public function checkAppEnvironment()
    {

        if ($this->app_env == 'local') {
            
            return true;

        } 
        
        elseif ($this->app_env == 'dev') {
            
            return true;

        } 
        
        elseif ($this->app_env == 'test') {
                    
            return true;
            
        } 
        
        else {
            
            return false;
            
        }

    }



    
    
   

}
