![Imgur](http://i.imgur.com/9PkXGOV.jpg)

### Features

+ Generate your models, views, controllers, routes and migrations just in a few clicks.

+ Models visualization through a graph presentation (**New Feature**).

+ Views scaffolding support Bootstrap and Materialize css.

+ Generate (OneToMany,ManyToMany) relationships including views and controllers.

+ Websockets using [pusher notifications](https://www.github.com/pusher).

+ AdminLTE dashboard template with users management system (users-roles-permissions) using [laravel-permission](https://github.com/spatie/laravel-permission).

+ Softdeletes and timestamps.

+ A delete confirmation message.

+ Using an interface to design your table.

+ Rollback possibility.

+ Generate CRUD for packages, see [Lpackager](https://github.com/amranidev/lpackager), [CRUD for packages/modules](http://amranidev.github.io/blog/site/crud-generator-for-packages/).


### Installation

1. Run the following command:

 `composer require maxolex/scaffold-interface`

2. Add the service providers to config/app.php:

 ```php
Maxolex\ScaffoldInterface\ScaffoldInterfaceServiceProvider::class,
Amranidev\Ajaxis\AjaxisServiceProvider::class,
Spatie\Permission\PermissionServiceProvider::class,
Pusher\Laravel\PusherServiceProvider::class,
 ```

3. Publish the assets in your application with:

 `php artisan vendor:publish --provider="Maxolex\ScaffoldInterface\ScaffoldInterfaceServiceProvider"`
 
 `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"`
 
 `php artisan vendor:publish --provider="Amranidev\Ajaxis\AjaxisServiceProvider"`
 

    What does this command publishes:

    app/Http/Controllers/UserController.php

    app/Http/Controllers/RoleController.php

    app/Http/Controllers/PermissionController.php

    resources/views/scaffold-interface (dashboard,users,roles,permissions blade)

    resources/views/scaffold-interface/layouts (you can edit your layouts before making crud)

    public/js/scaffold-interface-js

    public/css/scaffold-interface-css

    config/maxolex/config.php

    database/migrations/migration_file

4. Run migrations:

 `php artisan migrate`

5. Authentication scaffolding:

 `composer require laravel/ui`
 `php artisan ui vue --auth`

6. Add HasRole dependency to app/User.php:

```php
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
}
 ```
 
Congratulations, you have successfully installed Scaffold Interface!

Let's begin.

  Go to http://{your-project-url}/scaffold
 
### Detailed Documentation



### Contribution

 Any ideas are welcome. Feel free to submit any issues or pull requests.

#### Author

+ [Maxolex Togolais](https://github.com/maxolex)

#### Credits

+ [All Contributors](../../contributors)


#### Contact : maxolex12@gmail.com
