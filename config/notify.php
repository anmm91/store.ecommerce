<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notify Theme
    |--------------------------------------------------------------------------
    |
    | You can change the theme of notifications by specifying the desired theme.
    | By default the theme white is activated, but you can change it by
    | specifying the dark mode. if null `white` theme is active. To change theme
    | update the global variable to `dark`
    |
    */

    'theme' => env('NOTIFY_THEME', null),

    
    /*
    |--------------------------------------------------------------------------
    | Demo URL
    |--------------------------------------------------------------------------
    |
    | if true you can access to the demo documentation of the notify package
    | here: http://localhost:8000/notify/demo, by default is true
    |
    */

    'demo' => true,

    /*
    |--------------------------------------------------------------------------
    | Animate Module (use animate.css)
    |--------------------------------------------------------------------------
    |
    | Use animate.css to animate the notice.
    |
    */

    'animate' => [
        'in_class'  => 'bounceInRight', // The class to use to animate the notice in.
        'out_class' => 'bounceOutRight', // The class to use to animate the notice out.
        'timeout'   => 5000, // Number of seconds before the notice disappears
    ],

    /*
    |--------------------------------------------------------------------------
    | Notify Position
    |--------------------------------------------------------------------------
    |
    | The position string option is used to describe both vertical and horizontal alignment.
    | Element notifications and Global notifications can be vertically repositioned
    | to: "top", "middle" or "bottom" and horizontally repositioned to: "left", "center" or "right".
    | If we don't provide a position option the default alignments are "top right".
    | `Don't work on drakify notification`
    |
    | Available positions:
    | - "top-right"
    | - "top-left"
    | - "bottom-right"
    | - "bottom-left"
    | - "center-top"
    | - "center-bottom"
    |
    */

    'position' => 'top-right',

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    |
    */

    'preset-messages' => [
        // An example preset 'user updated' Connectify notification.
        'user-updated' => [
            'message' => 'The user has been updated successfully.',
            'type'    => 'success',
            'icon'    => 'flaticon2-check-mark',
            'model'   => 'connect',
            'title'   => 'User Updated',
        ],
    ],

    ##################################################
    'default' => 'toastr',

    'toastr' => [

        'class' => \Yoeunes\Notify\Notifiers\Toastr::class,

        'notify_js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js',
        ],

        'notify_css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css',
        ],

        'types' => [
            'error',
            'info',
            'success',
            'warning',
            'alert'
        ],

        'options' => [],
    ],

    'pnotify' => [

        'class' => \Yoeunes\Notify\Notifiers\Pnotify::class,

        'notify_js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js',
        ],

        'notify_css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css',
            'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.brighttheme.css',
        ],

        'types' => [
            'alert',
            'error',
            'info',
            'notice',
            'success',
        ],

        'options' => [],
    ],

    'sweetalert2' => [

        'class' => \Yoeunes\Notify\Notifiers\SweetAlert2::class,

        'notify_js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.min.js',
            'https://cdn.jsdelivr.net/npm/promise-polyfill',
        ],

        'notify_css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.min.css',
        ],

        'types' => [
            'error',
            'info',
            'question',
            'success',
            'warning',
        ],

        'options' => [],
    ],

];
