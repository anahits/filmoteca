<?php

return [
    /*
     |-----------------------------------------------------------------------------------------------------------------
     | Not add slash neither at the first and at the end, because the slashes are going to replaced with a dot
     | to the named route.
     */
    'admin-url-prefix'      => 'admin/static-pages',
    'pages-url-prefix'      => 'pages',
    'auth-filter'           => 'validate_admin',
    'pages-layout'  => 'layouts/default',
    'admin-layout'  => 'layouts.dashboard.master',
    'sections'      => [
        'title'     => 'title',
        'sidebar'   => 'sidebar',
        'main-menu' => 'main-menu',
        'content'   => 'content'
    ],
    'main-menu-name' => 'main'
];
