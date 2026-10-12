<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | storage disks are available to your application. Just specify away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem disks as you like, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as a starting point for your code.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,

        ],

        // Konfigurasi Supabase Storage untuk BaktiVoice
        'supabase' => [
            'driver' => 's3',
            'key' => env('SUPABASE_PUBLISHABLE_KEY'),
            'secret' => env('SUPABASE_SECRET_KEY'),
            'region' => 'us-east-1',
            'bucket' => env('SUPABASE_STORAGE_BUCKET', 'bukti-laporan'),
            'url' => env('SUPABASE_URL') . '/storage/v1/object/public',
            'endpoint' => env('SUPABASE_URL') . '/storage/v1/s3',
            'use_path_style_endpoint' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | "storage:link" Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
