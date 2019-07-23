<?php
return [
    'roles' => [
        'admin' => 'admins',
        'user' => 'users'
    ],
    'defaultUsersPermissions' => [
        [
            'controller' => 'App\Http\Controllers\PostController',
            'method' => 'store'
        ],
        [
            'controller' => 'App\Http\Controllers\PostController',
            'method' => 'create'
        ],
        [
            'controller' => 'App\Http\Controllers\PostController',
            'method' => 'index'
        ],
        [
            'controller' => 'App\Http\Controllers\PostController',
            'method' => 'update'
        ],
        [
            'controller' => 'App\Http\Controllers\PostController',
            'method' => 'edit'
        ]
    ]

];
