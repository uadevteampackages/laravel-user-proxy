<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel User Proxy</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            
            .lup_heading_container {
                margin-left: auto; 
                margin-right: auto; 
                margin-top: 20px; 
                margin-bottom: 20px; 
                width: 60%; 
                border-radius: 8px; 
                background-color: black; 
                color: #a3e635; 
                padding-left: 28px; 
                padding-right: 28px; 
                padding-top: 20px; 
                padding-bottom: 20px;
            }

            .lup_heading_container h1 {
                font-size: 30px; 
                font-weight: bold; 
                margin-bottom: 20px;
            }

            .lup_heading_container h1 a {
                color: #a3e635; 
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
                color: #a3e635; 
                text-decoration: underline;
            }

            .lup_heading_container p a {
                color: #a3e635; 
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

            .lup_body_container .module_box a {
                color: #007A00; 
                text-decoration: underline;
            }

            .lup_body_container .module_box a:hover {
                color: #006600; 
                text-decoration: none;
            }

            .lup_body_container .module_box p a {
                color: #007A00; 
                text-decoration: underline;
            }

            .lup_body_container .module_box p a:hover {
                color: #006600; 
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
                color: #a3e635; 
                border: none;
                cursor: pointer; 
            }

            .lup_body_container .module_box button.button-primary:hover {
                background-color: #a3e635; 
                color: black;
            }


        </style>


    </head>



    <body>


        <div class="lup_heading_container">
            
  
            <h1>
                <a href="{{ url('/laravel-user-proxy') }}">
                    Laravel User Proxy
                </a>
            </h1>

            <p>
                This package allows you to test your app with a proxy user. There are 2 ways to use this package: 
                <strong>Quick Proxy Mode</strong> and <strong>Full Proxy Mode</strong>.
            </p>

            <p>
                In Quick Proxy Mode, you set a key and a value for a session variable that will serve as your proxy user. 
                For example, you might set a key of "username" and a value of "csmith". 
                This will allow you to test your app as if you are the user with the username "csmith".
            </p>

            <p>
                In Full Proxy Mode, you search for a user by entering their userPrincipalName (as it would appear in Entra / Azure AD). 
                You can then view the user's information from Microsoft Entra (Azure AD). 
                If you want to proxy as that user, you can click the "Enter Full Proxy Mode as the Above User" button. 
                This will save your "real" user information and change your ms:user information to that of the user you selected to proxy.
            </p>

            <p>
                For full instructions on using each proxy mode, see the settings for 
                <a href="{{ url('/laravel-user-proxy/console-quick-proxy') }}">
                    Quick Proxy Mode
                </a> 
                and 
                <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}">
                    Full Proxy Mode
                </a>.
            </p>

        </div>




        <div class="lup_body_container">



                <div class="module_box">
                <h2>Proxy Mode</h2>

                <div style="display: flex; align-items: center; justify-content: space-between; gap: 4px; margin-bottom: 20px;">
                    <div style="width: 25%;">Currently In Full Proxy Mode?</div>
                    <div style="width: 10%; font-weight: bold;">
                        {{ session('full_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div style="width: 25%;">
                        <a href="{{ url('/laravel-user-proxy/console-full-proxy') }}" 
                            style="padding: 10px 20px; border-radius: 9999px; background-color: #84cc16; 
                            color: black; font-weight: bold; display: block; text-align: center; 
                            text-decoration: none;">
                            Full Proxy Settings
                        </a>
                    </div>
                    <div style="width: 25%;">
                        @if (session('full_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-full-proxy-mode') }}" 
                                style="padding: 10px 20px; border-radius: 9999px; background-color: black; 
                                color: #a3e635; font-weight: bold; display: block; text-align: center; 
                                text-decoration: none;">
                                Exit Full Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; gap: 4px; margin-bottom: 20px;">
                    <div style="width: 25%;">Currently In Quick Proxy Mode?</div>
                    <div style="width: 10%; font-weight: bold;">
                        {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div style="width: 25%;">
                        <a href="{{ url('/laravel-user-proxy/console-quick-proxy') }}" 
                            style="padding: 10px 20px; border-radius: 9999px; background-color: #84cc16; 
                            color: black; font-weight: bold; display: block; text-align: center; 
                            text-decoration: none;">
                            Quick Proxy Settings
                        </a>
                    </div>
                    <div style="width: 25%;">
                        @if (session('quick_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-quick-proxy-mode') }}" 
                                style="padding: 10px 20px; border-radius: 9999px; background-color: black; 
                                color: #a3e635; font-weight: bold; display: block; text-align: center; 
                                text-decoration: none;">
                                Exit Quick Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>

            </div>




            @if (session('quick_proxy_mode'))
                <div class="module_box">

                    <h2>Quick Proxy Session Variables</h2>

                    quick_proxy_session_key:  <span style="font-weight: bold;">{{ session('quick_proxy_session_key') }}</span><br/>
                    quick_proxy_session_value:  <span style="font-weight: bold;">{{ session('quick_proxy_session_value') }}</span><br/>
                    {{ session('quick_proxy_session_key') }}:  <span style="font-weight: bold;">{{ session('quick_proxy_session_value') }}</span>
                </div>
            @endif


            

            <div class="module_box">
                
                <h2>Session Variables</h2>

                <?php dump(session()->all()); ?>

            </div>






        </div>
       





    </body>


</html>







    
