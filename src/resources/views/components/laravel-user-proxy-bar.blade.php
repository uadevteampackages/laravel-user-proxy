
@php $show_laravel_user_proxy_bar = new \Uadevteampackages\LaravelUserProxy\Services\ShowHideLupService; 
     $show_laravel_user_proxy_bar = $show_laravel_user_proxy_bar->handle();
@endphp

@if ($show_laravel_user_proxy_bar == true)

    <div>
        <div style="background-color: #a3e635; padding: 20px;">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">

            
                <h2 style="font-size: 30px; font-weight: bold; margin-bottom: 20px; margin-top: 5px;">Laravel User Proxy</h2>

                <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 20px;">
                    <div style="width: 20%;">Currently In Full Proxy Mode?</div>
                    <div style="width: 16.666%; font-weight: bold;">
                        {{ session('full_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div style="width: 25%;">
                        <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}" 
                        style="padding: 10px 20px; border-radius: 9999px; background-color: white; 
                                color: black; font-weight: bold; text-align: center; display: block; 
                                text-decoration: none;">
                            Full Proxy Settings
                        </a>
                    </div>
                    <div style="width: 25%;">
                        @if (session('full_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-full-proxy-mode') }}" 
                            style="padding: 10px 20px; border-radius: 9999px; background-color: black; 
                                    color: #a3e635; font-weight: bold; text-align: center; display: block; 
                                    text-decoration: none;">
                                Exit Full Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 20px;">
                    <div style="width: 20%;">Currently In Quick Proxy Mode?</div>
                    <div style="width: 16.666%; font-weight: bold;">
                        {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div style="width: 25%;">
                        <a href="{{ url('/laravel-user-proxy/console-quick-proxy') }}" 
                        style="padding: 10px 20px; border-radius: 9999px; background-color: white; 
                                color: black; font-weight: bold; text-align: center; display: block; 
                                text-decoration: none;">
                            Quick Proxy Settings
                        </a>
                    </div>
                    <div style="width: 25%;">
                        @if (session('quick_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-quick-proxy-mode') }}" 
                            style="padding: 10px 20px; border-radius: 9999px; background-color: black; 
                                    color: #a3e635; font-weight: bold; text-align: center; display: block; 
                                    text-decoration: none;">
                                Exit Quick Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>


@endif
