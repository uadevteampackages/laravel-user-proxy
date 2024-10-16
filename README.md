


## General instructions

This package allows you to test your app with a proxy user. There are 2 ways to use this package: **Quick Proxy Mode** and **Full Proxy Mode**.

In Quick Proxy Mode, you set a key and a value for a session variable that will serve as your proxy user. For example, you might set a key of "username" and a value of "csmith". This will allow you to test your app as if you are the user with the username "csmith".

In Full Proxy Mode, you search for a user by entering their userPrincipalName (as it would appear in Entra / Azure AD). You can then view the user's information from Microsoft Entra (Azure AD). If you want to proxy as that user, you can click the "Enter Full Proxy Mode as the Above User" button. This will save your "real" user information and change your `ms:user` information to that of the user you selected to proxy.

For full instructions on using each proxy mode, see the settings pages for [Quick Proxy Mode]({{ url('/laravel-user-proxy/console-quick-proxy') }}) and [Full Proxy Mode]({{ url('/laravel-user-proxy/console-full-proxy') }}).



## Full proxy mode instructions

- Search for a user by entering their userPrincipalName (mybamausername@ua.edu).  
- View the user's information from Microsoft Entra (Azure AD).  
- If you want to proxy as that user, click the "Enter Full Proxy Mode as the Above User" button.  
- When you are done testing as the proxy user, click the "Exit User Proxy Mode" button. This will clear out all session variables and log you out of the application completely. At that point, you can start fresh with a new login in non-proxy mode.




## Quick proxy mode instructions

- Enter a key and value for your proxy session variable.  
- For example, you could enter "username" as the key and "csmith" as the value.  
- When you are finished testing as the quick proxy user, click the "Exit Quick Proxy Mode" button. This will clear out the session variables related to Quick Proxy Mode. Unlike Full Proxy Mode, you will not be logged out of the application.





## Set .env variables

You will need to have the following .env variables set in your Laravel application:

```

AZURE_CLIENT_ID=
AZURE_CLIENT_SECRET=
AZURE_TENANT_ID=
AZURE_REDIRECT_URI=

```

