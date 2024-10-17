<div>

    
    <div class="bg-lime-300 p-5">

        <div class="w-4/5 mx-auto">


            <h2 class="my-5">Laravel User Proxy</h2>

            <div class="flex items-center justify-between space-x-3 mb-5">
                <div class="w-1/5">Currently In Full Proxy Mode?</div>
                <div class="w-1/6 font-bold">
                    {{ session('full_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                </div>
                <div class="w-1/4">
                    <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}" 
                    class="px-5 py-2 rounded-full bg-white text-black font-bold hover:bg-black hover:text-lime-300 block text-center">
                        Full Proxy Settings
                    </a>
                </div>
                <div class="w-1/4">
                    @if (session('full_proxy_mode') == true)
                        <a href="{{ url('/laravel-user-proxy/exit-full-proxy-mode') }}" 
                        class="px-5 py-2 rounded-full bg-black text-lime-300 font-bold hover:bg-white hover:text-black block text-center">
                            Exit Full Proxy Mode
                        </a>
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-between space-x-3 mb-5">
                <div class="w-1/5">Currently In Quick Proxy Mode?</div>
                <div class="w-1/6 font-bold">
                    {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                </div>
                <div class="w-1/4">
                    <a href="{{ url('/laravel-user-proxy/console-quick-proxy') }}" 
                    class="px-5 py-2 rounded-full bg-white text-black font-bold hover:bg-black hover:text-lime-300 block text-center">
                        Quick Proxy Settings
                    </a>
                </div>
                <div class="w-1/4">
                    @if (session('quick_proxy_mode') == true)
                        <a href="{{ url('/laravel-user-proxy/exit-quick-proxy-mode') }}" 
                        class="px-5 py-2 rounded-full bg-black text-lime-300 font-bold hover:bg-white hover:text-black block text-center">
                            Exit Quick Proxy Mode
                        </a>
                    @endif
                </div>
            </div>


        </div>


    </div>


    
</div>





    