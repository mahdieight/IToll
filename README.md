## About Project
This project is designed to simulate the functionality of receiving and delivering orders from a source to a destination. The main difference between this project and services like Snapp and Tap30 is that this project is B2B-oriented and works with organizations.

## How to implement the project
Just like any Laravel application, first create a `.env` file. Then, execute the following commands in order:

- `composer install`
- `php artisan key:generate`
- `php artisan jwt:secret`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan serve`


Now we have to say that everything is great! Your app should be available at the following address:

`http://{host}:{app_port}/api/v1`

## Drivers & Collections
We have two tables named drivers and collections to store information about drivers and collections. You can retrieve useful information by viewing these tables. Additionally, I must mention that the tokens for drivers and collections are also stored within these two tables.

## List of endpoints
Here is an example of filtering orders with all parameters:

- Api for Collection : 

`POST : http://{host}:{app_port}/api/v1/orders`

`PUT : http://{host}:{app_port}/api/v1/orders/{order}/cancel`

- Api For Drivers:

`GET : http://{host}:{app_port}/api/v1/orders`


`PUT : http://{host}:{app_port}/api/v1/orders/{order}/assign`

`PUT : http://{host}:{app_port}/api/v1/orders/{order}/mark-delivered`

## Authorization
To authenticate, you need to send the `Authorization` key in the `header`. You can access the tokens by referring to the driver or collection table.

## Collection Webhook
To enable job queues for broadcasting webhooks in Laravel, you need to use the queue system. After setting the `QUEUE_CONNECTION` to 'database', you should run the following command.

`php artisan queue:work`


## Powered by Swagger
By running the command `php artisan l5-swagger:generate`, your Swagger documentation will be available at the following address.

`http://{host}:{app_port}/api/documentation`