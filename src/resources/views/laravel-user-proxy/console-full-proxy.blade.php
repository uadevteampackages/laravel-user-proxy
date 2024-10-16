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

            <p class="font-bold text-xl">Full Proxy Mode Instructions</p>

            <ol class="list-decimal list-inside text-white">
                <li class="mb-2">Search for a user by entering their userPrincipalName (mybamausername@ua.edu).</li>
                <li class="mb-2">View the user's information from Microsoft Entra (Azure AD).</li>
                <li class="mb-2">If you want to proxy as that user, click the "Enter Full Proxy Mode as the Above User" button.</li>
                <li class="mb-2">When you are done testing as the proxy user, click the "Exit User Proxy Mode" button.  This will clear out all session variables and log you out of the application completely.  At that point, you can start fresh with a new login in non-proxy mode.</li>
            </ol>
        </div>


        <div class="mx-auto mb-20 w-3/5 rounded-lg border border-black p-5">



            <div class="bg-slate-200 p-5 mx-5 my-5 rounded">
                <a href="{{ url('/laravel-user-proxy') }}" class="text-lime-800 underline">⬅️ Return to Laravel User Proxy Home</a>
            </div>



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
            </div>


            

    
            <div class="bg-slate-200 p-5 m-5 rounded">
                <div class="my-5">
                <h2>Search for User to Proxy</h2>
                    <form method="post" action="{{ url('/laravel-user-proxy/search-for-user') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="user_principal_name" class="mr-3">Enter a userPrincipalName (mybamausername@ua.edu) to view the MS Azure AD (Entra) information for a specific user:</label>
                            <input type="text" name="user_principal_name" class="mt-3 p-3 w-2/3 mx-auto rounded-md border-gray-300 shadow-sm focus:border-lime-300 focus:ring focus:ring-lime-200 focus:ring-opacity-50">
                        </div>
                        @error('user_principal_name')
                            <div class="bg-red-600 text-white p-3 rounded mb-5 w-2/3">{{ $message }}</div>
                        @enderror
                        @if(session('warning'))
                            <div class="bg-yellow-400 text-black p-3 rounded mb-5 w-2/3">
                                {{ session('warning') }}
                            </div>
                        @endif
                        <button type="submit" class="rounded-full my-5 px-5 py-3 bg-black text-lime-300">Search for User</button>
                    </form>
                    
                </div>
            </div>

            










        </div>
       





    </body>


</html>







    
