<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for category in block package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  category module in block package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name' => 'Category',
    'names' => 'Categories',
    'icon' => 'las la-list',

    /**
     * Singlular and plural name of the module
     */
    'title' => [
        'main' => 'Categories',
        'sub' => 'Categories'
    ],

    /**
     * Singlular and plural name of the module
     */
    'groups'         => [
        'main' => 'Main',
        'images' => 'Images',
        'details' => 'Details',
        'settings' => 'Settings'
    ],

    /**
     * Form sub section name for the module.
     */
    'sections' => [
        'main' => 'Main',
        'details' => 'Details',
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
        'status' => 
            [
                                
                [
                    'key'    => 'show',
                    'value'  => 'show',
                    'text'   => 'show',
                ],
                                
                [
                    'key'    => 'hide',
                    'value'  => 'hide',
                    'text'   => 'hide',
                ],
                                
            ],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'name'                       => 'Please enter name',
        'slug'                       => 'Please enter slug',
        'title'                      => 'Please enter title',
        'details'                    => 'Please enter details',
        'image'                      => 'Please enter image',
        'status'                     => 'Please select status',
        'user_type'                  => 'Please enter user type',
        'user_id'                    => 'Please enter user id',
        'upload_folder'              => 'Please enter upload folder',
        'deleted_at'                 => 'Please select deleted at',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'name'                       => 'Name',
        'slug'                       => 'Slug',
        'title'                      => 'Title',
        'details'                    => 'Details',
        'image'                      => 'Image',
        'status'                     => 'Status',
        'user_type'                  => 'User type',
        'user_id'                    => 'User id',
        'upload_folder'              => 'Upload folder',
        'deleted_at'                 => 'Deleted at',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
    ],

    
    ];
