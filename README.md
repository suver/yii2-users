Frapse Users
============
Your Users

Installation
------------


Either run

```
php composer.phar require suver/yii2-users
```

or add

```
"suver/yii2-users": "*"
```

Install migrations

```bash
// install module migrations
yii migrate --migrationPath=@vendor/suver/yii2-users/migrations

// install system rbac migrations
yii migrate --migrationPath=@yii/rbac/migrations
```

Configurations
--------------

Add this module in your `modules` and `bootsrap` directive

```
'bootstrap' => [
    'notifications',
],
'modules' => [
    'notifications' => [
        'class' => 'suver\behavior\notifications\Module',
        //      if you wont changed GridView or DataView classes
        //'dataViewWidget' => '\backend\widgets\DataView',
        //'gridViewWidget' => '\backend\widgets\GridView',
    ],
],
'components' => [
    'yii2-users' => [
        'class' => 'yii\rbac\DbManager',
    ],
];

```

or if you wont include module with access rule configuration you must configure module with `as access` directive like example


```
'bootstrap' => [
    'notifications',
],
'modules' => [
        'notifications' => [
            'class' => 'suver\behavior\notifications\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'controllers'=>['notifications/default'],
                        'allow' => true,
                        'roles' => ['@']                        
                    ],
                    [
                        'controllers'=>['notifications/list'],
                        'allow' => true,
                        'roles' => ['@']                        
                    ],
                    [
                        'controllers'=>['notifications/template'],
                        'allow' => true,
                        'roles' => ['@']                        
                    ],
                ]
            ]
        ],
    ],

```

How USE
-------

```php



```
