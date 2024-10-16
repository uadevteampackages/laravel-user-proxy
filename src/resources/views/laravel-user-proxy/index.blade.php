<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel User Proxy</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>



    <body>


        <div class="mx-auto my-5 w-3/5 rounded-lg bg-black text-lime-300 px-7 py-5">

            <h1 class="text-3xl mb-5"><a href="{{ url('/laravel-user-proxy') }}">Laravel User Proxy</a></h1>

            <p class="text-white">
                This package allows you to test your app with a proxy user. There are 2 ways to use this package: 
                <strong>Quick Proxy Mode</strong> and <strong>Full Proxy Mode</strong>. 
            </p>
            <p class="text-white">
                In Quick Proxy Mode, you set a key and a value for a session variable that will serve as your proxy user.  For example, you might set a key of "username" and a value of "csmith".  This will allow you to test your app as if you are the user with the username "csmith". 
            </p>
            <p class="text-white">
                In Full Proxy Mode, you search for a user by entering their userPrincipalName (as it would appear in Entra / Azure AD).  You can then view the user's information from Microsoft Entra (Azure AD).  If you want to proxy as that user, you can click the "Enter Full Proxy Mode as the Above User" button.  This will save your "real" user information and change your ms:user information to that of the user you selected to proxy.
            </p>
            <p class="text-white">
                For full instructions on using each proxy mode, see the settings for 
                <a href="{{ url('/laravel-user-proxy/console-quick-proxy') }}" class="text-lime-300 underline">Quick Proxy Mode</a> 
                and 
                <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}" class="text-lime-300 underline">Full Proxy Mode</a>.
            </p>

        </div>



        <div class="mx-auto mb-20 w-3/5 rounded-lg border border-black p-5">

            <div class="bg-slate-200 p-5 m-5 rounded">
                <h2 class="mb-5">Proxy Mode</h2>

                <div class="flex items-center justify-between space-x-1 mb-5">
                    <div class="w-1/4">Currently In Full Proxy Mode?</div>
                    <div class="w-1/10 font-bold">
                        {{ session('full_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div class="w-1/4">
                        <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}" 
                        class="px-5 py-2 rounded-full bg-lime-500 text-black font-bold hover:bg-lime-400 block text-center">
                            Full Proxy Settings
                        </a>
                    </div>
                    <div class="w-1/4">
                        @if (session('full_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-full-proxy-mode') }}" 
                            class="px-5 py-2 rounded-full bg-black text-lime-300 font-bold hover:bg-gray-800 block text-center">
                                Exit Full Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-between space-x-1 mb-5">
                    <div class="w-1/4">Currently In Quick Proxy Mode?</div>
                    <div class="w-1/10 font-bold">
                        {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div class="w-1/4">
                        <a href="{{ url('/laravel-user-proxy/console-quick-proxy') }}" 
                        class="px-5 py-2 rounded-full bg-lime-500 text-black font-bold hover:bg-lime-400 block text-center">
                            Quick Proxy Settings
                        </a>
                    </div>
                    <div class="w-1/4">
                        @if (session('quick_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-quick-proxy-mode') }}" 
                            class="px-5 py-2 rounded-full bg-black text-lime-300 font-bold hover:bg-gray-800 block text-center">
                                Exit Quick Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>
            </div>



            

            <div class="bg-slate-200 p-5 m-5 rounded">
               <h2>MS User Individual Session Variables</h2>

                ms:username:  <span class="font-bold">{{ session('ms:username') }}</span><br/>
                ms:email:  <span class="font-bold">{{ session('ms:email') }}</span><br/>
                ms:principalName:  <span class="font-bold">{{ session('ms:principalName') }}</span><br/>
                ms:id:  <span class="font-bold">{{ session('ms:id') }}</span><br/>
            </div>




            <div class="bg-slate-200 p-5 m-5 rounded">
               <h2>MS User Object (ms:user)</h2>

                @foreach (session('ms:user') as $key => $value)

                    @if ($key == 'token')

                        ms:user:{{ $key }}: <span class="font-bold break-all text-xs">{{ $value }}</span><br/>

                    @else

                        ms:user:{{ $key }}: <span class="font-bold break-all">{{ $value }}</span><br/>

                    @endif

                @endforeach
            </div>




            <div class="bg-slate-200 p-5 m-5 rounded">
                <h2>Real MS User (these values will be blank when not in proxy mode)</h2>

                real_ms_bannerUsername: <span class="font-bold">{{ session('real_ms_username') }}</span><br/>
                real_ms_id:  <span class="font-bold">{{ session('real_ms_id') }}</span><br/>
                real_ms_name:  <span class="font-bold">{{ session('real_ms_name') }}</span><br/>
                real_ms_email:  <span class="font-bold">{{ session('real_ms_email') }}</span><br/>
                real_ms_principalName:  <span class="font-bold">{{ session('real_ms_principalName') }}</span>
            </div>




            <div class="bg-slate-200 p-5 m-5 rounded">

                <?php dump(session()->all()); ?>

            </div>






        </div>
       





    </body>


</html>







    
