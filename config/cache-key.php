<?php

return [
    'payment-categories' => 'payment_categories',   #平台支付方式缓存
    'payment-user' => 'payment_user_:replace:',     #用户支付方式缓存  :replace: => UserId
    'digital-money' => 'digital_money',             #平台数字币种信息缓存
    'country-code' => 'country_code',               #国家地区信息缓存
    'currencies' => 'currencies',                   #币种信息缓存
    'banks' => 'banks',                             #bank信息缓存
    'web-socket-auth' => 'web_socket_auth_:replace:', # web socket 链接token  :replace: => token
    'user-web-socket-map' => 'user_web_socket_map:replace:',    # web socket 用户ID和客户端web socket ID的映射  :replace: => UserId
    'socket-user-map' => 'socket_user_map:replace:',  # web socket 用户ID和客户端web socket ID的映射  :replace: => Client ID
    'advertise-hide' => 'advertise_hide',             #隐藏的广告信息映射
];
