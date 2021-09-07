# Installation

The instructions below will help you to properly install the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/litecms/block/`

## Composer

Add the below entries in the `composer.json` file's autoload section and run the command `composer dump-autoload` in terminal.

```json

...
     "autoload": {
         ...

        "classmap": [
            ...
            
            "packages/litecms/block/database/seeds",
            
            ...
        ],
        "psr-4": {
            ...
            
            "Litecms\\Block\\": "packages/litecms/block/src",
            
            ...
        }
    },
...

```

## Config

Add the entries in service provider in `config/app.php`

```php

...
    'providers'       => [
        ...
        
        Litecms\Block\Providers\BlockServiceProvider::class,
        
        ...
    ],

    ...

    'alias'             => [
        ...
        
        'Block'  => Litecms\Block\Facades\Block::class,
        
        ...
    ]
...

```

## Migrate

After service provider is set run the commapnd to migrate and seed the database.


    php artisan migrate
    php artisan db:seed --class=Litecms\\Block\\Seeds\\BlockTableSeeder
    php artisan db:seed --class=Litecms\\Block\\Seeds\\CategoryTableSeeder

## Publishing


**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="view"


## URLs and APIs


### Web Urls

**Admin**

    http://path-to-route-folder/admin/block/{modulename}

**User**

    http://path-to-route-folder/user/block/{modulename}

**Public**

    http://path-to-route-folder/blocks


### API endpoints

**List**
 
    http://path-to-route-folder/api/user/block/{modulename}
    METHOD: GET

**Create**

    http://path-to-route-folder/api/user/block/{modulename}
    METHOD: POST

**Edit**

    http://path-to-route-folder/api/user/block/{modulename}/{id}
    METHOD: PUT

**Delete**

    http://path-to-route-folder/api/user/block/{modulename}/{id}
    METHOD: DELETE

**Public List**

    http://path-to-route-folder/api/block/{modulename}
    METHOD: GET

**Public Single**

    http://path-to-route-folder/api/block/{modulename}/{slug}
    METHOD: GET