## <p align="center"> Esperlos98 packages EsAuthentication for help Authentication easy passport </p>

## install passport passport is required
> 
>    - composer require laravel/passport
     
 ## install EsAuthentication
>
> - composer require laravel/passport

 ## publish config EsAuthentication
    

 ## Config  esauthentication /config/esauthentication
>
>  ### run install 
>  - php artisan passport:install 
>  
>>  <p>CLIENT_ID = your clinet id</p>
>>  SECRET_CLIENT_ID = "your secret client code id"
>>  

### clinet for passport 
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


### AuthServiceProvider add boot method

    Passport::routes();

    Passport::tokensExpireIn(now()->addMonth(12));
    Passport::refreshTokensExpireIn(now()->addMonth(15));


### add file user model 
    use Laravel\Passport\HasApiTokens;
    use HasApiTokens;

### change api drive auth config 

    'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],

## Routings
> ### for login 
> <p>yourdomine/es/api/v1/login</p> 

> ### for register  
> <p>youerdomine/es/api/v1/register</p>

