Lavalite package that provides block management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/block`.

    "litecms/block": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Litecms\Block\Providers\BlockServiceProvider::class,

And also add it to alias

    'Block'  => Litecms\Block\Facades\Block::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Litecms\\Block\\Seeds\\BlockTableSeeder
    php artisan db:seed --class=Litecms\\Block\\Seeds\\CategoryTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="view"


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