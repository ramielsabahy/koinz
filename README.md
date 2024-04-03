

## Koinz Book Recommendation Task

What do you need to get the project up and running ?

- Run `cp .env.example .env` to create the .env file
- You must have composer, if not please refer here to install it [Install Composer](https://getcomposer.org/download/).
- Run `composer install` to create the vendor directory
- Run `./vendor/bin/sail up -d` to run the dockerized project based on [Laravel Sail](https://laravel.com/docs/11.x/sail)
- If you reached this step with no errors Congrats you can visit [http://localhost](http://localhost) to double check that the project is up and running.



## Technologies used in this project

- Laravel 11 (latest)
- Laravel sail
- Docker based on laravel sail
- PHP version 8.2
- PHPUnit for unit test
- MySQL as a DBMS
- AWS (Free Tier) as a hosting platform

## About the architecture which i used
- ##### I used service oriented architecture to make it easy for everyone who maintains this code
- ##### I used events and listeners to separate the logic of sending SMS from the application logic itself
- ##### I applied factory design pattern to have multiple SMS provider and make it easy to add a new provider (just two modifications to add a new provider)
- ##### Made some unit tests to showcase how a unit test could be implemented

## Postman Documentation
- I made a simple postman automation to get the token and store it for any other request
- Collection link [https://documenter.getpostman.com/view/18596546/2sA35K2g55](https://documenter.getpostman.com/view/18596546/2sA35K2g55)
- I added samples for each response case (Login successful, Login failed ...etc)
