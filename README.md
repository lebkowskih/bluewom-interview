## Requirements
1. Windows with WSL or any Linux distro
2. Docker
3. Private key installed in Linux

## Steps for web application installation

1. Clone repository
```
git clone git@github.com:lebkowskih/bluewom-interview.git
```
2. Init project
```
cd bluewom-interview
composer update
./vendor/bin/sail build
./vendor/bin/sail up
cp .env.example .env
./vendor/bin/sail php artisan key:generate
```
3. Setup database
<br>Firstly, you have to set DB_PASSWORD in .env file
```
DB_PASSWORD=password
```
<br>Secondly, you have to run all migrations and seeders
```
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed UserSeeder
./vendor/bin/sail php artisan db:seed CurrencySeeder
```

4. Install and run Vite
```
npm install
npm run dev
```

Now you can enter the URL ``` localhost ``` and login by credentials below:
```
E-mail: test@test.test
Password: zaq1@WSX
```
