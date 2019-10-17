# Google-Analytics-get-View-ID
Get Google Analytics website View ID for and use it in your application.
Simple class for getting specific website google analytics VIEW_ID and using it to fetch it's Google Analytics data.

# Requirements
* [PHP 5.4.0 or higher](https://www.php.net/)

* [Google API Client Libraries for PHP](https://github.com/googleapis/google-api-php-client)

# Installation
* From [Here](https://developers.google.com/analytics/devguides/reporting/core/v4/quickstart/service-php) you can create google analytics reporting api tool.

* For getting View ID automatically and using it in analytics Api, you must follow these steps :

1. Authenticate user with Google OAuth and get `AccessToken`

2. Include php file in your project
```php
require_once '<PATH_TO_FILE>/get-view-id.php';
```
3. Call php class by passing website url and user access token into it. It will return website VIEW_ID if domain exists in user analytics account
```php
$viewId = new viewId($url, $accessToken);
```
