<?php

return [
    'err_messages' =>[
        10001=>'Client credentials not provided',
        10002=>'Required client parameter(s) missing or invalid',
        10003=>'Client authentication failed',
        10004=>'Client verification failed',
        10005=>'Invalid client state or configuration',
        10006=>'Client not authorized',
        14001=>'Invalid user credentials',
        14002=>'Invalid social login credentials',
        14003=>'User not authorized',
        14004=>'User access token expired or invalid or token absent',
        14005=>'Account not verified',
        14006=>'Invalid account verification code',
        20001=>'Resource not found',
        20002=>'Method not allowed',
        25001=>'Internal server error',
        25002=>'External service unavailable',
        25003=>'External service access denied',
        25004=>'Email service unavailable',
        25005=>'SMS gateway unavailable',
        25006=>'Push service unavailable',
        50001=>'Request malformed',
        60001=>'Invalid Attribute',
        60002=>'Email already exists',
        60003=>'Username already exists',
        60004=>'Password strength not sufficient',
        60005=>'Does not meet minimum age requirement',
        60006=>'Invalid old password',
        60007=>'Specified item not found',
        60008=>'Image too large',
        60009=>'Specified item invalid',
        60010=>'Specified item expired',
        60011=>'Specified item out of Stock',
        60012=>'You can only redeem one gift card',
    ],
    'suc_messages' =>[

    ],
    'web_base_path' =>  env('BASE_URL'),
    'headers'=>[
        'web'=>[
            'client_access_key'=>env('WEB_CLIENT_ACCESS_KEY'),
            'client_secret_key'=>env('WEB_CLIENT_SECRET_KEY') ,
            'client_version'=>env('WEB_CLIENT_VERSION'),
        ],
        'ios'=>[
            'client_access_key'=>env('IOS_CLIENT_ACCESS_KEY'),
            'client_secret_key'=>env('IOS_CLIENT_SECRET_KEY'),
            'client_version'=>env('IOS_CLIENT_VERSION'),
        ],
        'android'=>[
            'client_access_key'=>env('ANDROID_CLIENT_ACCESS_KEY'),
            'client_secret_key'=>env('ANDROID_CLIENT_SECRET_KEY'),
            'client_version'=>env('ANDROID_CLIENT_VERSION'),
        ]
    ],
    'new_arrival_time'=>30,
    'GOOGLE_RECAPTCHA_SECRET'=>env('GOOGLE_RECAPTCHA_SECRET'),
    'WEB_URL'=>env('WEB_URL')
];
