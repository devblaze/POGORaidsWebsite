## POGORaids

POGORaids is a project made to help the users of the famous mobile game Pokemon GO,
it will help them coordinate also communicate faster and with ease, their raid battles.

## Installation
Use Laradock to run the project, place it inside the project.
```bash
/POGORaidsWebsite/laradock-a
```
Edit the .env file of Laradock to your liking. *(Note: Development versions PHP 7.3, )
Run docker command.
```
docker-compose up -d nginx mysql phpmyadmin redis workspace 
```

Use the migration to install the database.
```
php artisan migrate
```

Use yarn for JavaScript and SCSS to compile.
```
yarn dev
```
_*And don't forget to configure your .env file._

## Edit Front End

If you want to change something to the front end, JavaScript or SCSS use:
```
yarn watch
```

## Live Demo
A live demo is set on my private server with limited access. *(Note: demo might be some versions behind.)*\
You can find the [Live Demo here](http://blazehomeserver.ddns.net/).

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

