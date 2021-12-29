# Tweeter

This was originally built a couple months after completing a bootcamp in Oct, 2020. The project was aimed at just consolidating my experience and built using Laravel and TailwindCSS. 

I've revisited this in Dec, 2021 to dockerise the application using Nginx to serve it. 

![recording](images/tweeter.gif)

## Installation

### Pull the repository

```bash
git clone git@github.com:daniel-norris/tweeter.git tweeter
```

### Populate the .env

```bash
cp .env.example .env

# fill out the following variables
# create any username
DB_USERNAME=
# set a password for the mysql user above
DB_PASSWORD=
# a root password you'll use to grant privileges to user above
DB_ROOT_PASSWORD=
```

### Start the containers
This will take a while on first run to build the app container.

```bash
docker-compose up -d
```

### Install dependencies

```bash
docker-compose exec app composer install
```

### Generate an app key

```bash
docker-compose exec php artisan key:generate
```

### Create a non-root MySQL user

```bash
docker-compose exec db bash

# run the following once in a bash shell in your db container
# enter the root password you set earlier when prompted
mysql -u root -p

# grant your tweeter user privileges to the tweeter db
grant all on tweeter.* to 'tweeter'@'%' identified by '<db_user_password>';

# flush privileges to set the changes
flush privileges

exit
```

### Run the migrations

```bash
docker-compose exec php artisan migrate
```

### View the app
Visit the app at `http://your_server_ip`
