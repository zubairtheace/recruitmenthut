<h1>Recruitment Hut</h1>



<h2>Git Configuration</h2>

<p>Enter Git User Name</p>
<code>git config --global user.name "Your Name"</code>
<br>
<hr>

<p>Enter Git Email address</p>
<code>git config --global user.email "tofy.zubair@gmail.com"</code>
<br>
<hr>

<p>Clone Git repository</p>
<code>git clone https://zubairtheace@gitlab.com/theteam2017/recruitmenthut.git</code>
<br>
<hr>


<h2>Install Required Softwares</h2>

<p>Install Composer</p>
<p><a href="https://getcomposer.org/download/1.4.1/composer.phar">Download Composer Here</a></p>
<br>
<hr>

<p>Install XAMPP</p>
<p><a href="https://www.apachefriends.org/xampp-files/7.1.1/xampp-win32-7.1.1-0-VC14-installer.exe">Download XAMPP Here</a></p>
<br>
<hr>


<h2>Check for latest versions of Softwares</h2>

<p><code>composer -v</code></p>
<br>
<br>
<p><code>php -v</code></p>
<br>
<hr>

<h2>Add Missing packages to Project</h2>
<p><code>composer install</code></p>
<br>
<hr>


<h2>Local Development Server</h2>
<p>Default server</p>
<p><code>php artisan serve</p></code>
<br>
<hr>

<p>OR serve to an specific IP and PORT</p>
<p><code>php artisan serve --host 192.168.100.6 --port 80</p></code>



<h1>Creating a Laravel Project from scratch</h1>

<h2>Creating a Laravel Project Via Composer Create-Project</h2>

<p><code>composer create-project --prefer-dist laravel/laravel supercars</p></code>

___________________

--Local Development Server--
php artisan serve

//serve to a specific ip and port
php artisan serve --host 192.168.100.6 --port 80

___________________

--Pull from Master branch--

// pull request
git pull
___________________

--Commit Changes to Master branch--

// Getting initial status
git status

//Adding all files in directory
git add .

//check for status again
git status

//Commit changes and add message
git commit -m "Laravel Message"

//check for status again
git status

//push to master
git push origin master

____________________

--Laravel Migration--
//find more on : https://laravel.com/docs/5.4/migrations

//create table
$ php artisan make:migration create_cars_table

//Navigate to : database>migrations to see created files
//add fields in the "public function up()"

//migrating tables to database
php artisan migrate

//Overwriting tables
php artisan migrate:refresh

//Removing all tables from database
php artisan migrate:reset
____________________

--Laravel Collective--

//Use laravelcollective to create forms etc...
composer require laravelcollective/html

//Add to config/app.php in the providers array
Collective\Html\HtmlServiceProvider::class,

//Add to config/app.php in the aliases array
'Form' => Collective\Html\FormFacade::class
____________________

--Laravel CRUD--

//Creating a controller with resource files
php artisan make:controller CarController --resource

//Creating the model
php artisan make:model Car

//Adding a route for the controller in the web.php file in the routes folder
Route::resource('/car', 'CarController');

//Adding views
Create a folder "car" in the "views" folder
Add the File:
create.blade.php
edit.blade.php
index.blade.php
show.blade.php

____________________

--Validation of forms--

//Adding a Request
php artisan make:request CreateCategoryFormRequest

//change authorize to true
public function authorize()
{
    return true;
}

//add required rules
return [
      'car_name' => 'required'
    ];

//In the Controller update the store action to accept a $request object of type CreateCarFormRequest
public function store(CreateCarFormRequest $request)
{
    ...
}

//In the Controller update the update action to accept a $request object of type CreateCarFormRequest
public function update(CreateCarFormRequest $request)
{
    ...
}

____________________
