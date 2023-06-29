Lavalite package that provides block management facility for the cms.

## Installation

Run the below command form the root folder of lavalite.

```
    composer require "litecms/block"
```


## Migration and seeds

```
    php artisan migrate
    php artisan db:seed --class=Litecms\\Block\\Seeders\\BlockTableSeeder
```

## Publishing

* Configuration
```
    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="config"
```
* Language
```
    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="lang"
```
* Views
```
    php artisan vendor:publish --provider="Litecms\Block\Providers\BlockServiceProvider" --tag="view"
```


## URLs and APIs


### Web Urls

* Admin
```
    http://path-to-route-folder/admin/block/{modulename}
```

* User
```
    http://path-to-route-folder/user/block/{modulename}
```

* Public
```
    http://path-to-route-folder/blocks
```


### API endpoints

These endpoints can be used with or without `/api/`
And also the user can be varied depend on the type of users, eg user, client, admin etc.

#### Resource

* List
```
    http://path-to-route-folder/api/user/block/{modulename}
    METHOD: GET
```

* Create
```
    http://path-to-route-folder/api/user/block/{modulename}
    METHOD: POST
```

* Edit
```
    http://path-to-route-folder/api/user/block/{modulename}/{id}
    METHOD: PUT
```

* Delete
```
    http://path-to-route-folder/api/user/block/{modulename}/{id}
    METHOD: DELETE
```

#### Public

* List
```
    http://path-to-route-folder/api/block/{modulename}
    METHOD: GET
```

* Single Item
```
    http://path-to-route-folder/api/block/{modulename}/{slug}
    METHOD: GET
```

#### Others

* Report
```
    http://path-to-route-folder/api/user/block/{modulename}/report/{report}
    METHOD: GET
```

* Export/Import
```
    http://path-to-route-folder/api/user/block/{modulename}/exim/{exim}
    METHOD: POST
```

* Action
```
    http://path-to-route-folder/api/user/block/{modulename}/action/{id}/{action}
    METHOD: PATCH
```

* Actions
```
    http://path-to-route-folder/api/user/block/{modulename}/actions/{action}
    METHOD: PATCH
```

* Workflow
```
    http://path-to-route-folder/api/user/block/{modulename}/workflow/{id}/{transition}
    METHOD: PATCH
```
