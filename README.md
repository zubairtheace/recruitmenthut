<h1>Recruitment Hut</h1>
<hr>
<br>

<h2>Git Configuration</h2>
<hr>

<p>Enter Git User Name</p>
<code>git config --global user.name "Your Name"</code>
<br>

<p>Enter Git Email address</p>
<code>git config --global user.email "tofy.zubair@gmail.com"</code>
<br>

<p>Clone Git repository</p>
<code>git clone https://zubairtheace@gitlab.com/theteam2017/recruitmenthut.git</code>
<br>

<p>Navigate to project folder</p>
<code>cd recruitmenthut</code>
<br>
<br>


<h2>Install Required Softwares</h2>
<hr>

<p>Install Composer</p>
<p><a href="https://getcomposer.org/download/1.4.1/composer.phar">Download Composer Here</a></p>
<br>
<p>Install XAMPP</p>
<p><a href="https://www.apachefriends.org/xampp-files/7.1.1/xampp-win32-7.1.1-0-VC14-installer.exe">Download XAMPP Here</a></p>
<br>


<h2>Check for latest versions of Softwares</h2>
<hr>

<p><code>composer -v</code></p>
<p><code>php -v</code></p>
<br>
<br>

<h2>Add Missing packages to Project</h2>
<hr>
<p><code>composer install</code></p>
<br>


<h2>Create Database</h2>
<hr>
<p>Create a new database called:</p>
<p><code>recruitmenthut</code></p>
<br>


<h2>Generate .ENV File</h2>
<hr>
<p>Create a new . env file from the .env.example file</p>
<p><code>cp .env.example .env</code></p>
<br>
<p>Generate a key for the .ENV File</p>
<p><code>php artisan key:generate</code></p>
<br>


<h2>Run Migration</h2>
<hr>
<p>Create all tables in the database</p>
<p><code>php artisan migrate:refresh</code></p>
<br>


<h2>Local Development Server</h2>
<hr>
<p>Default server</p>
<p><code>php artisan serve</p></code>
<p>visit localhost:8000/ in browser</p>
<br>








<h1>Using Git</h1>
<hr>
<br>

<p>pull request</p>
<p><code>git pull</p></code>
<br>

<p>Getting status</p>
<p><code>git status</p></code>
<br>

<p>Adding all files in directory</p>
<p><code>git add .</p></code>
<br>

<p>Commit changes and add message</p>
<p><code>git commit -m "Laravel Message"</p></code>
<br>

<p>Push to Master Branch</p>
<p><code>git push origin master</p></code>
<br>
