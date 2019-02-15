# <img src="/screenshots/logo.png" alt="logo" title="logo" width="200">

# A web application that allows a user to research and watch videos

Please find full description of the project :point_right: [here](hypertube.en.pdf) :point_left:.

## Used technologies:

:point_right: Laravel framework

:point_right: Video streaming with Node.js

:point_right: External API

:point_right: Custom design framework

## Below you can look at some screenshots for different features:

1. Start page with **Sign in, Sign up, Reset password and Choose language buttons**.
<img src="/screenshots/screen_4.png" alt="Sign in, Sign up" title="Sign in, Sign up">

2. **Sign up** form.
<img src="/screenshots/screen_3.png" alt="Sign up" title="Sign up">

3. Home page with **search and filter features and list of films**.
<img src="/screenshots/screen_1.png" alt="search, filter and list of films" title="search, filter and list of films">

4. Home page with **live search**.
<img src="/screenshots/screen_8.png" alt="live search" title="live search">

5. Film details page with **description, torrent links and comment field**.
<img src="/screenshots/screen_2.png" alt="description, torrent links and commentaries" title="description, torrent links and commentaries">

6. **Filter by genre**.
<img src="/screenshots/screen_5.png" alt="Filter by genre" title="Filter by genre">

7. **Edit user's profile**.
<img src="/screenshots/screen_6.png" alt="Edit user profile" title="Edit user profile">

8. **Сomment field**.
<img src="/screenshots/screen_7.png" alt="commentaries" title="commentaries">

## Installation

1. Clone the repository
```
git clone https://github.com/Navalag/hypertube_42.git
```

2. Go to /src directory
```
cd hypertube_42(or your folder)/src
```

3. Install composer (composer and laravel should be already installed, otherwise just google how to install)
```
php composer.phar install
```

4. Add .env with your database and other configurations.
In .env.example you will find sqlite connection. This is the simpliest way for fast start.
To run this way just create database/database.sqlite file.
```
cp .env.example .env
php artisan key:generate
touch database/database.sqlite (only if you want to use sqlite connection)
```

5. Run migrations.
```
php artisan migrate
```

6. Start php and node servers (you need php and node.js to be installed on your machine)
```
php artisan serve
cd src/public/stream
bash start.sh (wait few minutes to install all dependencies)
```
Now you can try to sign in with Oauth, to register with email you have to add MAIL_DRIVER to .env file.

**Thats it!** :ok_hand: you can now open project in browser.

#### Enjoy :joy:

## How to contact me
If you found mistake || bug || have any questions || suggestions, please feel free to contact me at telegram @Navalag.
