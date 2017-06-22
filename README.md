Server-Status.io
===
Server-Status.io is a new server monitoring and tracking solution currently being developed.
You can follow the development on my [blog](http://blog.server-status.io).

### Installation
1. Clone the repository 
2. Run `composer install` in the project directory
3. Run `npm install` in the project directory
4. Install [Redis](https://redis.io/)
5. Install Laravel-Echo-Server globally by running `npm install -g laravel-echo-server`

### Development Mode
1. Serve: `php artisan serve`
2. Compile JS and SASS: `npm run watch`
3. Laravel Event queue: `php artisan queue:work`
4. Run the Redis server: `./redis-server` in the `src` directory of your redis installation
5. Laravel Echo Server: `laravel-echo-server start`


