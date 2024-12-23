
## Overview

This package allows you to test your app with a proxy user.


## Installation

Laravel User Proxy can be installed with Composer, by running the following command from within your Laravel application's root directory.

```

composer require uadevteampackages/laravel-user-proxy --dev


```

After successful installation, you can access the Laravel User Proxy settings panel by browsing to the /lup route of your Laravel application.


## Set .env variables

You will need to set the following Azure AD / Entra variables in your Laravel application's .env file:

```

LUP_AZURE_CLIENT_ID=
LUP_AZURE_CLIENT_SECRET=
LUP_AZURE_TENANT_ID=

```

Those variables must match an Azure AD / Entra app that has proper permissions to read user information from Azure AD / Entra.



## Package is only active in local, dev, or test app environments 

The Laravel User Proxy package will only be active and usable in your application if the APP_ENV .env variable is set to one of the following values:  local, dev, test.



## Instructions


1. Search for a user by entering their userPrincipalName (mybamausername@ua.edu for faculty/staff, mybamausername@crimson.ua.edu for students).
2. View the user's information from Microsoft Entra (Azure AD).
3. If you have found the right user and would like to test the app as that user, click the "Enter Proxy Mode as the Above User" button.
4. Once you enter proxy mode, you will need to visit the app home page (or other app pages) to access the app as the proxy user would. This is because the routes within the Laravel User Proxy settings do not use your application's middleware by default, so these settings pages most likely will not reflect the proxy user's experience.
5. When you are finished testing as the proxy user, click the "Exit User Proxy Mode" button. This will clear out all session variables and log you out of the application completely. At that point, you can start fresh with a new login in non-proxy mode.

Please keep in mind this package was developed for internal use within a certain organization and is unlikely to be useful outside that setting.

