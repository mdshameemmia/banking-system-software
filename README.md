###  Banking System Software Install 

## create .env file and update this credentials 

`DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bankings
DB_USERNAME=root
DB_PASSWORD=`

## If bankings db is not available on your desktop database, create a db name as 'bankings'
## run this command 
01. composer update 
02. php artisan migrate
03. php artisan optimize
04. php artisan config:cache
## finally run this project by this commnad 
01. php artisan serve 
## copy this url which is laravel project provided and paste it browser .  Hopefully it's running successfully 
