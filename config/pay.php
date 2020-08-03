<?php

return [
    'alipay' => [
        // 支付宝分配的 APPID
        'app_id' => env('ALI_APP_ID', '2016101000649547'),

        // 支付宝异步通知地址
        'notify_url' => '',

        // 支付成功后同步通知地址
        'return_url' => '',

        // 阿里公共密钥，验证签名时使用
        'ali_public_key' => env('ALI_PUBLIC_KEY', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhd+ARnsEAbtJzmBBY0hT1lVTokpNfBU2Fo+SMjgb1rjTgnlShVF+zK5OVoqvhsbGBJcIaztPsDo6jAfmA/xDvnYwR6eENYYp61xmGVbW3zT+GxlUozp5v8KGP84Obyo9cW1B8SZL2vHgKA3FPTtyLIVCou5L8ca6zVS9a+S156pmpeEoQHaRTSv9TuMEhJcDxCPc9TE9jTUvfM59H/JThAuxHPABTGKsO8KQUPP76z63SINMacfmWBl+NyrLv1YVKdn9jS4oiklDLKJgdyJhZuoEwl+uhHYv2QUQHNe8jJSPvX+FDI6OzHVSz5BeZRln5+oCn9sVK8GHuj3be3pPiwIDAQAB'),

        // 自己的私钥，签名时使用
        'private_key' => env('ALI_PRIVATE_KEY', 'MIIEowIBAAKCAQEAllVp84Q6dlNnNXTEEqY407rkWDa3aJSWxgHLy0TlW1qCKUh7AWKAh7rU/p3qHoJi+KkaE3ceF03qslIy9uA6lvcfqGi2lzhcB5cSId25E8NqH76Vccb5CjILl6LQt5Zro6Q18N6AXsk9gllNAZMxPEoMHyQz6+4I7NIl/eGuZzwEJJw2AQe7RQ65LZFLGoE4qyw3SKPe4A1jB2VxCxsD3dkc8O9ykVQ9n/njZ4kDl2ognxqzeqiW6rVivT3LTDFvFRW8mfrEuEI1PXHsPseqR8ZhvKVUWGtoA2r86HBGd9Lq5jr8I/993en0nUFfdsVydMjidMloNTWUTv27mj90ZQIDAQABAoIBAHlSGvwr9OYy7rLENcv7Gxc71zWdiqw6ZecL4gR76ECuLSbV2HbIoINo8qU8mYjfnrGf/mxBECasecBI99omIQJeEs1dHCWzlQmHEFoGTms1o/pUWtSER8zDkHliKuBN4zYfumxVk/FqpFoCaVPhDrXh6CBlngVDhy5fdcuKiq3CEub/uz014ZS6kLWHd3qTzdDCUFu943/PN/uyYaTNynMPy1QzBCBQrJtdlY9GH2qvtkFy/ed0tWcagS+T1th1iznPCf+fktcnRPux0HXu5GHP3YI/ApjSFzKorZcix2os9yCi3+7r9MMWb88I/EzS0JjBKJGZLQvkJjMpH9nAn8ECgYEA05KOOmhCciKasdb2j6fsyrr8hq1W1u9R3TxvMRw6QtCa2UgR15zGpolMVoJgUeGDQa2rzF5HTE26SZIouPnT78k+g2083fpYednonuRluD2e1nPrafKK50/uMlkuD/Gb+BXjOS6+8PrYzOZMm1+pQOkJDEDWBWw38JW+mRRBYDECgYEAtebb4SKOBlITlULTdLmxR93IYdl0TyDlJoLr7HX26XHpQHNVtilBadxCVSoRP8emk7z4+eiUrBVxRz9vjfikn13V9MNjq6q/5/QwweAdQAJSVfofJZ7DEZGGBAUfpoAnGE8WNM2wF6O5vUYL/P0+LOkz5YEfDB5m+C0WrK003nUCgYEAt4+DzrD+VUAorvsuWFz9WLb6uW5S1ZA1mpkAb79p3OZYMwQQVt0yjPK6RKRBJUlfM/CWCW4SteUKJyKkKji25GfZ0PVJxd2aPb4N0S2gA0WTNcTFDtrcIOx8YTp2eGbLR2bWCZrBFxrMVpnJBVTt599HdlYaWgIWVqnU/8NPJUECgYBhj5Zy46OlBDR4o8TiIA5Ta0JkKMtW/V+qDiIXSxXJE011QebAstPgwT/aiZuCx8QyDPLEptfGjCGbgwyD6s3wo9VzV7CHjCctcy0LbvaBND2Q23wFI2egbpqgYVceaDGPuitA2ukNZMTkHUOkxvaoA9PPzjcmus+jYBt/Nc7bWQKBgE9pmghuBTlvCvI72fB9naReYJeaHHTpfEDmwqMDIqQK5YaCoktepxxBjeAlW4kLxAPtxvHWJN/ipLXo440On7Fblryd17sDOEhsScIkWoRt5oGQfZ8K9/PqcAuXHYqvGSHpjt3A5hA0aoaeIqHdzT7Z/fRfBAItmV+BfxAXZu1g'),

        // 使用公钥证书模式，请配置下面两个参数，同时修改 ali_public_key 为以 .crt 结尾的支付宝公钥证书路径，如（./cert/alipayCertPublicKey_RSA2.crt）
        // 应用公钥证书路径
        // 'app_cert_public_key' => './cert/appCertPublicKey.crt',

        // 支付宝根证书路径
        // 'alipay_root_cert' => './cert/alipayRootCert.crt',

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/alipay.log'),
            //  'level' => 'debug'
            //  'type' => 'single', // optional, 可选 daily.
            //  'max_file' => 30,
        ],

        // optional，设置此参数，将进入沙箱模式
        // 'mode' => 'dev',
    ],

    'wechat' => [
        // 公众号 APPID
        'app_id' => env('WECHAT_APP_ID', ''),

        // 小程序 APPID
        'miniapp_id' => env('WECHAT_MINIAPP_ID', ''),

        // APP 引用的 appid
        'appid' => env('WECHAT_APPID', ''),

        // 微信支付分配的微信商户号
        'mch_id' => env('WECHAT_MCH_ID', ''),

        // 微信支付异步通知地址
        'notify_url' => '',

        // 微信支付签名秘钥
        'key' => env('WECHAT_KEY', ''),

        // 客户端证书路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_client' => '',

        // 客户端秘钥路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_key' => '',

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/wechat.log'),
            //  'level' => 'debug'
            //  'type' => 'single', // optional, 可选 daily.
            //  'max_file' => 30,
        ],

        // optional
        // 'dev' 时为沙箱模式
        // 'hk' 时为东南亚节点
        // 'mode' => 'dev',
    ],
];
