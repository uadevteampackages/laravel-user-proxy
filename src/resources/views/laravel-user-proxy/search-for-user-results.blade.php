<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel User Proxy</title>

        <style>
            
            .lup_heading_container {
                margin-left: auto; 
                margin-right: auto; 
                margin-top: 20px; 
                margin-bottom: 20px; 
                width: 60%; 
                border-radius: 8px; 
                background-color: black; 
                color: #84cc16; 
                padding-left: 28px; 
                padding-right: 28px; 
                padding-top: 20px; 
                padding-bottom: 20px;
                font-family: Arial, sans-serif;
                line-height: 1.4;  
            }

            .lup_heading_container h1 {
                font-size: 30px; 
                font-weight: bold; 
                margin-bottom: 20px;
            }

            .lup_heading_container h1 a {
                color: #84cc16; 
                text-decoration: none;
            }

            .lup_heading_container h2 {
                font-size: 22px; 
                font-weight: bold; 
                margin-bottom: 20px;
            }

            .lup_heading_container p {
                color: white; 
                margin-bottom:15px;
            }

            .lup_heading_container a {
                color: #84cc16; 
                text-decoration: underline;
            }

            .lup_heading_container p a {
                color: #84cc16; 
                text-decoration: underline;
            }

            .lup_heading_container p a:hover {
                color: #84cc16;
            }

            .lup_heading_container ol {
                list-style-type: decimal;
                list-style-position: inside;
                color: white;
            }

            .lup_heading_container ul {
                list-style-type: disc;
                list-style-position: inside;
                color: white;
            }

            .lup_heading_container ol li, .lup_heading_container ul li {
                margin-bottom: 10px;
            }



            .lup_body_container {
                margin-left: auto;        
                margin-right: auto;       
                margin-bottom: 20px;    
                width: 60%;         
                border-radius: 0.5rem;  
                border-width: 1px;      
                border-color: black;      
                border-style: solid;      
                padding: 20px; 
                font-family: Arial, sans-serif;
                line-height: 1.4;             
            }

            .lup_body_container h2 {
                font-weight:bold; 
                margin-bottom:10px; 
                font-size:18px;
            }

            .lup_body_container .module_box {
                background-color: #e2e8f0; 
                padding: 20px; 
                margin: 20px; 
                border-radius: 6px;
            }

            .lup_body_container .module_box p {
                margin-bottom: 15px;
            }

            .lup_body_container .module_box a {
                color: #22880e; 
                text-decoration: underline; 
                font-weight: bold;
            }

            .lup_body_container .module_box a:hover {
                color: #22880e; 
                text-decoration: none; 
                font-weight: bold;
            }

            .lup_body_container .module_box p a {
                color: #22880e; 
                text-decoration: underline;
            }

            .lup_body_container .module_box p a:hover {
                color: #22880e; 
                text-decoration: none;
            }

            .lup_body_container .module_box ol {
                list-style-type: decimal;
                list-style-position: inside;
                color: white;
            }

            .lup_body_container .module_box ul {
                list-style-type: disc;
                list-style-position: inside;
                color: white;
            }

            .lup_body_container .module_box ol li, .lup_body_container .module_box ul li {
                margin-bottom: 10px;
            }

            .lup_body_container .module_box button.button-primary {
                border-radius: 9999px; 
                padding: 12px 20px; 
                background-color: black; 
                color: #84cc16; 
                border: none;
                cursor: pointer; 
                font-weight: bold;
            }

            .lup_body_container .module_box button.button-primary:hover {
                background-color: #84cc16; 
                color: black;
            }


        </style>


    </head>



    <body>


        <div class="lup_heading_container">

            <h1><a href="{{ url('/laravel-user-proxy') }}">Laravel User Proxy</a></h1>

            <p>This package allows you to test your app with a proxy user. </p>

            <ol>
                <li>Search for a user by entering their userPrincipalName (mybamausername@ua.edu for faculty/staff, mybamausername@crimson.ua.edu for students).</li>
                <li>View the user's information from Microsoft Entra (Azure AD).</li>
                <li>If you have found the right user and would like to test the app as that user, click the "Enter Proxy Mode as the Above User" button.</li>
                <li>Once you enter proxy mode, you will need to visit the app home page (or other app pages) to access the app as the proxy user would. This is because the routes within the Laravel User Proxy settings do not use your application's middleware by default, so these settings pages most likely will not reflect the proxy user's experience.</li>
                <li>When you are finished testing as the proxy user, click the "Exit User Proxy Mode" button.  This will clear out all session variables and log you out of the application completely.  At that point, you can start fresh with a new login in non-proxy mode.</li>
            </ol>

        </div>




        <div class="lup_body_container">


            <div class="module_box">
                <div style="margin-top:20px; margin-bottom:20px;">
                    <a href="{{ url('/laravel-user-proxy') }}">⬅️  Return to Laravel User Proxy Home</a>
                </div>
                <div style="margin-bottom:20px;">
                    <a href="{{ url('/') }}">⬅️  Return to App Home Page</a>
                </div>
                <div style="margin-bottom:20px;">
                    <a href="{{ url('/laravel-user-proxy') }}">⬅️  Search for Another User</a>
                </div>
            </div>


        
            <div class="module_box">
                <h2>User Info from MS Graph API</h2>

                <p>userPrincipalName: <strong>{{ $user_from_entra['userPrincipalName'] }}</strong></p>
                <p>mail: <strong>{{ $user_from_entra['mail'] }}</strong></p>
                <p>id: <strong>{{ $user_from_entra['id'] }}</strong></p>
                <p>displayName: <strong>{{ $user_from_entra['displayName'] }}</strong></p>
                <p>givenName: <strong>{{ $user_from_entra['givenName'] }}</strong></p>
                <p>surname: <strong>{{ $user_from_entra['surname'] }}</strong></p>

                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <form method="post" action="{{ url('/laravel-user-proxy/enter-proxy-mode') }}">
                        @csrf
                        <input type="hidden" name="user_principal_name_to_proxy" value="{{ $user_from_entra['userPrincipalName'] }}">
                        
                        <button type="submit" class="button-primary">
                            Enter Proxy Mode as the Above User
                        </button>
                    </form>
                </div>
            </div>



            <div class="module_box">
                
                <h2>Session Variables</h2>

                <?php dump(session()->all()); ?>

            </div>


                
        </div>
       


    </body>


</html>







    
