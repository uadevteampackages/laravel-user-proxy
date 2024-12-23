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
                    <a href="{{ url('/') }}">⬅️  Return to App Home Page</a>
                </div>
            </div>




            <div class="module_box">
                <h2>Proxy Mode</h2>

                <div style="display: flex; align-items: center; justify-content: space-between; gap: 4px; margin-bottom: 20px;">
                    <div style="width: 33.33%;">Currently In Proxy Mode?</div>
                    <div style="width: 33.33%; font-weight: bold;">
                        {{ session('proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div style="width: 33.33%;">
                        @if (session('proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-proxy-mode') }}" 
                                style="padding: 10px 20px; border-radius: 9999px; background-color: black; 
                                color: #84cc16; font-weight: bold; display: block; text-align: center; 
                                text-decoration: none;">
                                Exit Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>

                <p style="margin-top:30px;">Once you enter proxy mode, you will need to <a href="{{ url('/') }}">visit the app home page</a> (or other app pages) to access the app as the proxy user would.  This is because the routes within the Laravel User Proxy settings do not use your application's middleware by default, so these settings pages most likely will not reflect the proxy user's experience.</p>
            </div>


            

    
            <div class="module_box">
                <h2>Search for User to Proxy</h2>
                <form method="post" action="{{ url('/laravel-user-proxy/search-for-user') }}">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label for="user_principal_name" style="margin-right: 12px;">
                            Enter a userPrincipalName (mybamausername@ua.edu for faculty/staff, mybamausername@crimson.ua.edu for students) to view the MS Azure AD (Entra) information for a specific user:
                        </label>
                        <input type="text" name="user_principal_name" 
                            style="margin-top: 12px; padding: 12px; width: 66.67%; margin-left: auto; margin-right: auto; 
                            border-radius: 4px; border: 1px solid #d1d5db; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); 
                            transition: border-color 0.2s ease, box-shadow 0.2s ease;"
                            onfocus="this.style.borderColor='#84cc16'; this.style.boxShadow='0 0 0 3px rgba(140, 198, 22, 0.3)';"
                            onblur="this.style.borderColor='#d1d5db'; this.style.boxShadow='';">
                    </div>
                    @error('user_principal_name')
                        <div style="background-color: #dc2626; color: white; padding: 12px; border-radius: 4px; 
                            margin-bottom: 20px; width: 66.67%;">
                            {{ $message }}
                        </div>
                    @enderror
                    @if(session('warning'))
                        <div style="background-color: #fbbf24; color: black; padding: 12px; border-radius: 4px; 
                            margin-bottom: 20px; width: 66.67%;">
                            {{ session('warning') }}
                        </div>
                    @endif
                        
                    <button type="submit" class="button-primary" style="margin-bottom:20px;">
                        Search for User
                    </button>
                </form>
            </div>



            <div class="module_box">
                
                <h2>Session Variables</h2>

                <?php dump(session()->all()); ?>

            </div>

            

        </div>
       



    </body>


</html>







    
