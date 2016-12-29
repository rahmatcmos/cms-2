#Beyond Plus CMS (2.0.2 Beta)
Beyond Plus CMS is the modular based Content Management System. It support to create websites and web application quickly. 

##Requirement

* PHP 5.5.9 greater or equal
* Database
* [Composer](https://getcomposer.org)
* [Nodejs](https://nodejs.org)

##Installation

##Terminal and Database connect

* composer create-project --prefer-dist beyondplus/cms projectname
* create database and configuration in .env (or) vi .env
* composer dump-autoload
* php artisan migrate:refresh --seed
* npm install

##For Custom Module
* php artisan module:create name-of-your-module
* php artisan module:install {module_alias_name}

##Usage
* siteurl.com/bp-admin/login

##Theme
* resources/views/theme

##Theme Assets
* public/assets/

##Default Email and Password
* email 	: root@email.com
* password	: root

##We used Technology
* Laravel 5.3 Framework
* Vue JS 2
* Jquery
* Bootstrap CSS Framework
* Gentelella ( CSS Admin Panel )
* font-awesome

##Frontend Screenshot
![alt text](https://github.com/BeyondPlusTrainingCentre/cms/raw/master/frontend.png "Front Screenshot")

##Backend Screenshot
![alt text](https://github.com/BeyondPlusTrainingCentre/cms/raw/master/backend.png "Backend Screenshot")

##Security Vulnerabilities

If you discover a security vulnerability within Beyond Plus CMS, please send an e-mail to San Pwint Thu at sanpwintthu@hotmail.com.

##License

The Beyond Plus CMS is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

##Our Website

[www.beyondplus.net](http://www.beyondplus.net)

##Youtube Video

[https://www.youtube.com/watch?v=WV9rfMdqmh0](https://www.youtube.com/watch?v=WV9rfMdqmh0)

##Donate the Beer

*CB Bank Account No  : 0010600500612014
*KBZ Bank Account No : 99930799902832301
