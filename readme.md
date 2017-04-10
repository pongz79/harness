## How to use
* Run _composer install_
* Make sure that the variables _DB_HOST_, _DB_USERNAME_ and _DB_PASSWORD_ have the correct values for your 
database connection in the _.evn_ file
* Run _php artisan migrate_

The API can be used by calling the endpoints:
* GET register - Allows users to register
* GET login - Allows users to login
* GET media - Lists all Media titles
* POST media - Creates a media title
* PATCH media - Updates an existing media title
* DELETE media - Deletes an existing media title

There's also feature ad unit tests that can be run by executing:

<code>
./vendor/bin/phpunit
</code>

## Notes
Apologies for not completing the task but I kept track of the time spent writing this.

The only thing missing is the user groups implementation and allowing/restricting access to the endpoints based 
on the user associated role. This could be done by extending the User model to include a role column and restrict 
this access on a middleware class that could easily be configured on the routes.