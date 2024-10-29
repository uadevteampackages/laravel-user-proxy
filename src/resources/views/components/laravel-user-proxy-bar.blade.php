@php
    $show_laravel_user_proxy_bar = new \Uadevteampackages\LaravelUserProxy\Services\ShowHideLupService;
    $show_laravel_user_proxy_bar = $show_laravel_user_proxy_bar->handle();
@endphp

@if ($show_laravel_user_proxy_bar == true)



<div style="background-color: #84cc16;">
    <div style="padding-top:20px; padding-bottom:20px; margin: 0 auto; width: 90%; display: flex; align-items: center;">
        

        <div style="width: 60%; margin-left: auto; margin-right: auto;">
            <div style="margin-bottom: 10px; font-size:1.4em; font-weight:bold;">
                Laravel User Proxy
            </div>

            <div style="margin-bottom:10px;">
                <span style="margin-right: 15px;">Currently In Full Proxy Mode?</span>  
                {{ session('full_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }} 

            </div>

            <div style="margin-bottom:10px;">
                <span style="margin-right: 15px;">Currently In Quick Proxy Mode?</span>  
                {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
            </div>
        </div>


        <div style="width: 30%; display: flex; flex-direction: column; gap: 15px;">
            <div style="text-align: left;">
                <a href="{{ url('/laravel-user-proxy') }}" 
                style="min-width: 180px; padding: 10px 20px; border-radius: 9999px; 
                        background-color: white; color: #333333; font-weight: bold; 
                        text-align: center; text-decoration: none; display: block;">
                    Go to Laravel User Proxy Settings
                </a>
            </div>

            <div style="text-align: left;">
                <a href="{{ url('/') }}" 
                style="min-width: 180px; padding: 10px 20px; border-radius: 9999px; 
                        background-color: white; color: #333333; font-weight: bold; 
                        text-align: center; text-decoration: none; display: block;">
                    Go to App Home Page
                </a>
            </div>
        </div>


    </div>
</div>


@endif
