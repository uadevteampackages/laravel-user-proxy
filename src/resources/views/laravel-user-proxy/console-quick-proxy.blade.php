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
                color: #84cc16; 
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

            <h2>Quick Proxy Mode Instructions</h2>

            <ol>
                <li>Enter a key and value for your proxy session variable.</li>
                <li>For example, you could enter "username" as the key and "csmith" as the value.</li>
                <li>When you are finished testing as the quick proxy user, click the "Exit Quick Proxy Mode" button.  This will clear out the session variables related to Quick Proxy Mode.  Unlike Full Proxy Mode, you will not be logged out of the application.</li>
            </ol>
        </div>




        <div class="lup_body_container">



            <div class="module_box">
                <div style="margin-top:20px; margin-bottom:25px;">
                    <a href="{{ url('/laravel-user-proxy') }}">⬅️  Return to Laravel User Proxy Home</a>
                </div>
                <div style="margin-bottom:20px;">
                    <a href="{{ url('/') }}">⬅️  Return to App Home Page</a>
                </div>
            </div>



            <div class="module_box">
                <h2>Proxy Mode</h2>

                <div style="display: flex; align-items: center; justify-content: space-between; gap: 4px; margin-bottom: 20px;">
                    <div style="width: 33.33%;">Currently In Quick Proxy Mode?</div>
                    <div style="width: 33.33%; font-weight: bold;">
                        {{ session('quick_proxy_mode') == true ? '🟢 Yes' : '🔴 No' }}
                    </div>
                    <div style="width: 33.33%;">
                        @if (session('quick_proxy_mode') == true)
                            <a href="{{ url('/laravel-user-proxy/exit-quick-proxy-mode') }}" 
                                style="padding: 10px 20px; border-radius: 9999px; background-color: black; 
                                color: #84cc16; font-weight: bold; display: block; text-align: center; 
                                text-decoration: none;">
                                Exit Quick Proxy Mode
                            </a>
                        @endif
                    </div>
                </div>
            </div>



        

            <div class="module_box">
                <h2>Quick Proxy Session Variables</h2>
                <form method="post" action="{{ url('/laravel-user-proxy/enter-quick-proxy-mode') }}">
                    @csrf

                    {{-- Loop through 5 sets of session key-value pairs --}}
                    @for ($i = 1; $i <= 5; $i++)
                        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 15px;">
                            
                            {{-- Key Group --}}
                            <div style="display: flex; align-items: center; gap: 8px; flex: 1;">
                                <label for="quick_proxy_session_key_{{ $i }}" style="min-width: 70px;">
                                    Key #{{ $i }}:
                                </label>
                                <input type="text" 
                                    name="quick_proxy_session_key_{{ $i }}" 
                                    style="flex: 1; padding: 8px; border-radius: 4px; border: 1px solid #d1d5db;">
                            </div>
                            @error("quick_proxy_session_key_{{ $i }}")
                                <div style="background-color: #dc2626; color: white; padding: 8px; border-radius: 8px;">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Value Group --}}
                            <div style="display: flex; align-items: center; gap: 8px; flex: 1;">
                                <label for="quick_proxy_session_value_{{ $i }}" style="min-width: 70px;">
                                    Value #{{ $i }}:
                                </label>
                                <input type="text" 
                                    name="quick_proxy_session_value_{{ $i }}" 
                                    style="flex: 1; padding: 8px; border-radius: 4px; border: 1px solid #d1d5db;">
                            </div>
                            @error("quick_proxy_session_value_{{ $i }}")
                                <div style="background-color: #dc2626; color: white; padding: 8px; border-radius: 8px;">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    @endfor

                    <button type="submit" class="button-primary" style="margin-top: 20px;">
                        Enter Quick Proxy Mode with the Above Session Variables
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







    
