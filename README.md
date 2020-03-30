# MVCASS
A really bad Instagram clone.

Setup:
1. Clone the repository and cd into it.

2. Install composer using:

> curl -s https://getcomposer.org/installer | php
> sudo mv composer.phar /usr/local/bin/composer
3. Install dependencies and dump-autoload:

> composer install
> composer dump-autoload
4. Copy config/sample.config.php as config/config.php and edit it accordingly:

> cp config/sample.config.php config/config.php
5.  Edit the file using your mysql database credentials
6. Import schema present in schema/schema.sql in your database.

7. Serve the public folder at any port (say 8000):
 
> cd public
> php -S localhost:8000
