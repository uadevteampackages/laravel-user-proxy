


## General instructions

This package allows you to test your app with a proxy user. There are 2 ways to use this package: **Quick Proxy Mode** and **Full Proxy Mode**.

In Quick Proxy Mode, you set a key and a value for a session variable that will serve as your proxy user. For example, you might set a key of "username" and a value of "csmith". This will allow you to test your app as if you are the user with the username "csmith".

In Full Proxy Mode, you search for a user by entering their userPrincipalName (as it would appear in Entra / Azure AD). You can then view the user's information from Microsoft Entra (Azure AD). If you want to proxy as that user, you can click the "Enter Full Proxy Mode as the Above User" button. This will save your "real" user information and change your `ms:user` information to that of the user you selected to proxy.

For full instructions on using each proxy mode, see the settings pages for [Quick Proxy Mode]({{ url('/laravel-user-proxy/console-quick-proxy') }}) and [Full Proxy Mode]({{ url('/laravel-user-proxy/console-full-proxy') }}).



## Installation

Laravel User Proxy can be installed with Composer, by running the following command from within your Laravel application's root directory.

```

composer require uadevteampackages/laravel-user-proxy


```

Please keep in mind this package was developed for internal use within a certain organization and is unlikely to be useful for general use.


## Set .env variables

You will need to set the following Azure AD / Entra variables in your Laravel application's .env file:

```

AZURE_CLIENT_ID=
AZURE_CLIENT_SECRET=
AZURE_TENANT_ID=
AZURE_REDIRECT_URI=


```

Those variables must match an Azure AD / Entra app that has proper permissions to read user information from Azure AD / Entra.

You will also need to set the following variables in your Laravel application's .env file.  


```

LUP_ALLOWED_USERNAMES=user1,user2,user3


```

The value of LUP_ALLOWED_USERNAMES should be a comma-separated list of usernames of the users who should be allowed to access the Laravel User Proxy settings.  The Laravel User Proxy package will only be enabled if the ms:username value in your session variables matches one of the usernames in this list.  (These should be formatted as username only, not email addresses or userPrincipalNames, etc.).



## Package is only active in certain app environments (local, dev, test)

Even after installation, the Laravel User Proxy package will only be active and usable in your application if your ms:username value is listed in the LUP_ALLOWED_USERNAMES .env variable and the APP_ENV .env variable is set to one of the following values:  local, dev, test.



## Full proxy mode instructions

- Search for a user by entering their userPrincipalName (mybamausername@ua.edu).  
- View the user's information from Microsoft Entra (Azure AD).  
- If you want to proxy as that user, click the "Enter Full Proxy Mode as the Above User" button.  
- When you are done testing as the proxy user, click the "Exit User Proxy Mode" button. This will clear out all session variables and log you out of the application completely. At that point, you can start fresh with a new login in non-proxy mode.




## Quick proxy mode instructions

- Enter a key and value for your proxy session variable.  
- For example, you could enter "username" as the key and "csmith" as the value.  
- When you are finished testing as the quick proxy user, click the "Exit Quick Proxy Mode" button. This will clear out the session variables related to Quick Proxy Mode. Unlike Full Proxy Mode, you will not be logged out of the application.



