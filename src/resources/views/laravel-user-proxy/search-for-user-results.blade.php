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

            <p>This package allows you to test your app with a proxy user, using their directory information from Microsoft Entra (Azure AD).</p>

            <ol class="list-decimal list-inside">
                <li class="mb-2">Search for a user by entering their userPrincipalName (mybamausername@ua.edu).</li>
                <li class="mb-2">View the user's information from Microsoft Entra (Azure AD).</li>
                <li class="mb-2">If you want to proxy as that user, click the "Enter Proxy Mode as the Above User" button.</li>
                <li class="mb-2">When you are done testing as the proxy user, click the "Exit User Proxy Mode" button.  This will clear out all session variables and log you out of the application completely.  At that point, you can start fresh with a new login in non-proxy mode.</li>
            </ol>

        </div>




        <div class="mx-auto mb-20 w-3/5 rounded-lg border border-black p-5">


            <div class="bg-slate-200 p-5 mx-5 my-5 rounded">
                <a href="{{ url('/laravel-user-proxy') }}" class="text-lime-800 underline">⬅️ Return to Laravel User Proxy Home</a>
            </div>


        
            <div class="bg-slate-200 p-5 m-5 rounded">
                <h2>User Info from MS Graph API</h2>

                <p class="mb-5">userPrincipalName: <strong>{{ $user_from_entra['userPrincipalName'] }}</strong></p>
                <p class="mb-5">mail: <strong>{{ $user_from_entra['mail'] }}</strong></p>
                <p class="mb-5">id: <strong>{{ $user_from_entra['id'] }}</strong></p>
                <p class="mb-5">displayName: <strong>{{ $user_from_entra['displayName'] }}</strong></p>
                <p class="mb-5">givenName: <strong>{{ $user_from_entra['givenName'] }}</strong></p>
                <p class="mb-5">surname: <strong>{{ $user_from_entra['surname'] }}</strong></p>

                <div class="mt-10 mb-5">
                    <form method="post" action="{{ url('/laravel-user-proxy/enter-full-proxy-mode') }}">
                        @csrf
                        <input type="hidden" name="user_principal_name_to_proxy" value="{{ $user_from_entra['userPrincipalName'] }}">
                        
                        <button type="submit" class="rounded-full px-5 py-3 bg-black text-lime-300">
                            Enter Full Proxy Mode as the Above User
                        </button>

                        <div class="mt-5">
                            <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}" class="inline-block rounded-full px-5 py-3 bg-black text-lime-300">
                                Search for Another User
                            </a>
                        </div>
                    </form>
                </div>
            </div>


                
        </div>
       


    </body>


</html>







    
