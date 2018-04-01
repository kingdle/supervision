<?php
return [
    'default' => 'sendcloud',

    'providers' => [

        'aliyun' => [
            'region'     => 'cn-hangzhou',
            'access_id'  => env('ALIYUN_SMS_ACCESS_ID', ''),
            'access_key' => env('ALIYUN_SMS_ACCESS_KEY', ''),
        ],

        'sendcloud' => [
            'sms_user' => env('SEND_CLOUD_USER', ''),
            'sms_key'  => env('SEND_CLOUD_KEY', ''),
            'timestamp' => false, // 是否启用时间戳
        ],
    ]
];


