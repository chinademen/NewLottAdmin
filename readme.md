## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

部署代码操作：
clone代码库后，执行
mkdir -p storage/{app,debugbar,framework/{cache,sessions,views},locks,logs/chat-server}
mkdir -p bootstrap/cache
mkdir -p uploads

sudo chmod -R 777 storage uploads bootstrap/cache
php artisan key:generate

vi .env
.env配置参考.env.example, 如下:


APP_NAME=acoin
APP_ENV=local
APP_KEY=base64:pOA4aSA4h7WIMhohMibXNkhJCT79xBiaGDjFWRHOPgw=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost


#tidb config info
DB_CONNECTION=mysql
DB_HOST=172.16.100.161
DB_PORT=4000
DB_DATABASE=lottery
DB_USERNAME=garin
DB_PASSWORD=garin

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
SESSION_DRIVER=memcached

#QUEUE config
QUEUE_PREFIX=acoin-
QUEUE_HOST=127.0.0.1
QUEUE_DRIVER=beanstalkd

MEMCACHED_HOST=127.0.0.1
MEMCACHED_PORT=11211
MEMCACHED_WEIGHT=100

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

##
STATIC_RES_URL = "https://static.acoin-dev.com"
##默认头像文件名
DEFAULT_AVATAR = "/img/def_head.png"

##Chat Server Config
CHAT_SERVER_HOST = 0.0.0.0
CHAT_SERVER_PORT = 9502
CHAT_SERVER_LOG_PATH = "logs/chat-server"

nginx 配置如下:

# DC Admin
server {
    listen 80;

    root /home/user/Workspace/dc-admin/public;
    index index.php index.html index.htm;
    server_name admin.dc.com;
    include /etc/nginx/conf.d/uri_acl_for_all.include;
    include /etc/nginx/conf.d/ua_acl_for_all.include;

    access_log /var/log/nginx/dc-admin.log access buffer=6k;
    location / {
            try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        # NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
        # With php5-cgi alone:
        # fastcgi_pass 127.0.0.1:9000;
        # With php5-fpm:
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}

# DC User
server {
    listen 80;

    root /home/user/Workspace/dc-user/public;
    index index.php index.html index.htm;
    #keep white list
    server_name www.dc.com;

    include /etc/nginx/conf.d/uri_acl_for_all.include;
    include /etc/nginx/conf.d/ua_acl_for_all.include;

    access_log /var/log/nginx/dc-user.log access buffer=6k;
    location / {
            try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        # NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
        # With php5-cgi alone:
        # fastcgi_pass 127.0.0.1:9000;
        # With php5-fpm:
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
