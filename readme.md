Laravel package that provides content block management facility for lavalite CMS.

## Installation

Require this package with composer. 

    composer require litecms/block

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.


## Publishing

**Configuration**

    php artisan vendor:publish --provider="Litecms\Block\BlockServiceProvider" --tag="config"

**Language**

    php artisan vendor:publish --provider="Litecms\Block\BlockServiceProvider" --tag="lang"

**Files**

    php artisan vendor:publish --provider="Litecms\Block\BlockServiceProvider" --tag="storage"

### Views

Publish views to resources\views\vendor directory

    php artisan vendor:publish --provider="Litecms\Block\BlockServiceProvider" --tag="view"

Publishes admin view to admin theme

    php artisan theme:publish --provider="Litecms\Block\BlockServiceProvider" --view="admin" --theme="admin"

Publishes public view to public theme

    php artisan theme:publish --provider="Litecms\Block\BlockServiceProvider" --view="public" --theme="public"