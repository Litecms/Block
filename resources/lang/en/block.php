<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for block in block package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  block module in block package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name' => 'Block',
    'names' => 'Blocks',
    'icon' => 'las la-list',

    /**
     * Singlular and plural name of the module
     */
    'title' => [
        'main' => 'Blocks',
        'sub' => 'Blocks'
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
        'category_id'                => 'Please enter category id',
        'name'                       => 'Please enter name',
        'url'                        => 'Please enter url',
        'icon'                       => 'Please enter icon',
        'order'                      => 'Please enter order',
        'description'                => 'Please enter description',
        'image'                      => 'Please enter image',
        'images'                     => 'Please enter images',
        'slug'                       => 'Please enter slug',
        'status'                     => 'Please select status',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
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
        'category_id'                => 'Category id',
        'name'                       => 'Name',
        'url'                        => 'Url',
        'icon'                       => 'Icon',
        'order'                      => 'Order',
        'description'                => 'Description',
        'image'                      => 'Image',
        'images'                     => 'Images',
        'slug'                       => 'Slug',
        'status'                     => 'Status',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'upload_folder'              => 'Upload folder',
        'deleted_at'                 => 'Deleted at',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
    ],

        /**
     * Label for workflows.
     */
    'workflow' => [
        'submit' => [
            'label' => 'Submit',
            'icon' => 'save',
            'varient' => 'outline',
        ],
        'approve' => [
            'label' => 'Approve',
            'icon' => 'save',
            'varient' => 'outline',
        ],
        'reject' => [
            'label' => 'Reject',
            'icon' => 'save',
            'varient' => 'danger',
        ],
        'publish' => [
            'label' => 'Publish',
            'icon' => 'save',
            'varient' => 'outline',
        ],
        'unpublish' => [
            'label' => 'Unpublish',
            'icon' => 'save',
            'varient' => 'outline',
        ],
        'archive' => [
            'label' => 'Archive',
            'icon' => 'save',
            'varient' => 'danger',
        ],
        'unarchive' => [
            'label' => 'Unarchive',
            'icon' => 'save',
            'varient' => 'outline',
        ],
    ],
    
    ];
