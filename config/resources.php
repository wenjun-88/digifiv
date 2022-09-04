<?php

return [

    /*
     | The target storage disk to store resources
     */
    'disk' => env('RESOURCES_STORAGE_DISK', 'public'),

    /*
     | The paths to store resources
     */
    'storagePath' => env('RESOURCES_STORAGE_PATH', 'resources'),
];
