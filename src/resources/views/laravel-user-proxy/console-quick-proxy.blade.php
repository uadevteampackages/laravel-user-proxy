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

            <p class="font-bold text-xl">Quick Proxy Mode Instructions</p>

            <ol class="list-decimal list-inside text-white">
                <li class="mb-2">Enter a key and value for your proxy session variable.</li>
                <li class="mb-2">For example, you could enter "username" as the key and "csmith" as the value.</li>
                <li class="mb-2">When you are finished testing as the quick proxy user, click the "Exit Quick Proxy Mode" button.  This will clear out the session variables related to Quick Proxy Mode.  Unlike Full Proxy Mode, you will not be logged out of the application.</li>
            </ol>
        </div>


        <div class="mx-auto mb-20 w-3/5 rounded-lg border border-black p-5">



            <div class="bg-slate-200 p-5 mx-5 my-5 rounded">
                <a href="{{ url('/laravel-user-proxy') }}" class="text-lime-800 underline">⬅️ Return to Laravel User Proxy Home</a>
            </div>



            <div class="bg-slate-200 p-5 m-5 rounded">
                <h2 class="mb-5">Proxy Mode</h2>

                <div class="flex items-center justify-between space-x-1 mb-5">
                    <div class="w-1/3">Currently In Quick Proxy Mode?</div>
                    <div class="w-1/3 font-bold">
                        {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div class="w-1/3">
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
                <h2>Quick Proxy</h2>
                <form method="post" action="{{ url('/laravel-user-proxy/enter-quick-proxy-mode') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="quick_proxy_session_key" class="mr-3">
                            Enter a key for your quick proxy session variable:
                        </label>
                        <input type="text" 
                            name="quick_proxy_session_key" 
                            class="mt-3 p-3 w-2/3 mx-auto rounded-md border-gray-300 shadow-sm focus:border-lime-300 focus:ring focus:ring-lime-200 focus:ring-opacity-50">
                    </div>
                    @error('quick_proxy_session_key')
                        <div class="bg-red-600 text-white p-3 rounded mb-5 w-2/3">{{ $message }}</div>
                    @enderror


                    <div class="mb-5">
                        <label for="quick_proxy_session_value" class="mr-3">
                            Enter a value for your quick proxy session variable:
                        </label>
                        <input type="text" 
                            name="quick_proxy_session_value" 
                            class="mt-3 p-3 w-2/3 mx-auto rounded-md border-gray-300 shadow-sm focus:border-lime-300 focus:ring focus:ring-lime-200 focus:ring-opacity-50">
                    </div>
                    @error('quick_proxy_session_value')
                        <div class="bg-red-600 text-white p-3 rounded mb-5 w-2/3">{{ $message }}</div>
                    @enderror


                    <button type="submit" class="rounded-full my-5 px-5 py-3 bg-black text-lime-300">
                        Enter Quick Proxy Mode with the Above Session Variable
                    </button>
                </form>
            </div>


    






        </div>
       





    </body>


</html>







    
