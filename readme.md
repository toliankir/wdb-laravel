**REQUIREMENTS**
* Latest version Composer from `https://getcomposer.org/download/`
* Latest version of php `www.php.net`. Must be global access to php runnable file. 
* Latest Mysql compatible database server.  

**INSTALLATION**
* Make `git clone https://github.com/toliankir/wdb-laravel.git` in destination folder. It is make `wdb-laravel` folder with project. 
* Change folder to `wdb-laravel`. 
* Run `composer i` in wdb-laravel folder.  
* Change file name of `.env.example` to `.env`. Then change `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` parameters in `.env` file according to your database server settings.
* Create database for project. Database name must be equal to `DB_DATABASE` parameter.
* Run `php artisan migrate`. It is create needed tables in database.
* Run `php artisan db:seed`. It is fills database tables by start data. 
* Run `php artisan key:generate`. It is generates new unique key and save it's in .env file.
* Run `php artisan serve`. It is runs simple http server with your application.
* Application available on localhost:8000 in your browser.
* Application available on address `localhost:8000` in your browser.

**USING**

* Login first. On start application already have two user: 
   - email `admin@test.com`, password `12345678`
   - email `user@test.com`, password `12345678`
* You can create your own user. But for work it is mast be activate by admin.
* Also on start application have two roles and permissions for them. You can change them in admin mode.
* By default users may make all requests. By permissions you can control user requests. For example, you can forbid all user request using `!*` permission. `!` - mean forbid, `*` - all mask. Or you can allow only `localhost:8000/posts` page if you use first permission - `/posts*`, second - `!*`.
* You can change, add or delete users, roles, permissions, users posts in admin mode.
* All admin feature available by menu `Admin` in left top part of page.
* User can only create post and save it is to database.
