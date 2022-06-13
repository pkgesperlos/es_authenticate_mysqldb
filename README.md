## <p align="center"> Esperlos98 packages EsAuthentication for help Authentication easy passport </p>

## install passport passport is required
> 
>    - composer require laravel/passport
     
 ## install EsAuthentication
>
> - composer require esperlos98/esauthentication

 ## publish config EsAuthentication
 >
 > php artisan vendor:publish --tag=config
    

 ## Config  esauthentication /config/esauthentication or .env add
>
>  ### run install 
>  - php artisan passport:install 
>> use Password grant client
>>  <p>CLIENT_ID = your clinet id</p>
>>  SECRET_CLIENT_ID = "your secret client code id"
>>  
> <p></p>

### clinet for passport default username is email you can  change to any 
    "client" => [
        "GRANT_TYPE" => env("GRANT_TYPE","password"),
        "GRANT_REFRESH_TOKEN" => env("GRANT_REFRESH_TOKEN","refresh_token"),
        "CLIENT_ID" => env("CLIENT_ID"), 
        "SECRET_CLIENT_ID" => env("SECRET_CLIENT_ID"),
        "SCOPE" => env("SCOPE",""),
        "USER_NAME"=> env("USER_NAME","email"),
    ],
### rules   
    "rules" => [
        "Register" => [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ],
        "Login" => [
            'email' => 'required|email',
            'password' => 'required',
        ],
    ],
### massages    
    "massages" => [
        "required" => 601,
        "confirmed" => 602,
        "min" => 603,
        "email" => 604,
        "unique" => 605
    ],
### user register fileds     
    "userFileds" => [
        "name" => "name",
        "email" => "email",
        "password" => "password",
    ],


### app\Providers\AuthServiceProvider add boot method 
    use Laravel\Passport\Passport;

    Passport::routes();

    Passport::tokensExpireIn(now()->addMonth(12));
    Passport::refreshTokensExpireIn(now()->addMonth(15));


### add file user model /app/Models/User.php

###  <p>note for laravel 9</p> 

> remove use Laravel\Sanctum\HasApiTokens;

    use Laravel\Passport\HasApiTokens;
    use HasApiTokens;

### add api drive  config/auth.php array guards and use middleware auth:api

    'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],


## Routings
> ### for login 
> <p>yourdomine/es/api/v1/login</p>
> <p>parameters : email ,password</p> 

> ### for register  
> <p>youerdomine/es/api/v1/register</p>
> <p>parameters : email , name , password , password_confirmation</p>

> ### for refresh token  
> <p>youerdomine/es/api/v1/refreshToken</p>
> <p> parameter : refresh_token </p>

