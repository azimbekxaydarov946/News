# News

<h3><b>Requirements:</b></h3><br/>
    
   <code> PHP: 8.0.*</code>

<h3><b>Installation steps:</b></h3><br/>

git clone  https://github.com/azimbekxaydarov946/News.git

<code>cd news</code><br/>

<code>composer update</code>

<code>copy .env.example to .env</code>

<code>creae db</code>

<code>write db credentials to .env file</code>

<code>php artisan key:generate</code>

<code>php artisan migrate:fresh</code>

<code>php artisan db:seed</code>

<code>php artisan storage:link</code>

<code>php artisan optimize</code>

<code>php artisan route:trans:clear</code>

<code>php artisan serve</code>

<h3><b>Authorization:</b></h3><br/>

<code>URL: /admin</code>
    
|           email         |   password |
|-------------------------|------------|
|      admin@gmail.com    |  12345678  |
