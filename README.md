# Tic Tac Toe

This is a Tic Tac Toe game, build with PHP 5.6

### Prerequisites

To run this project you will need Composer

### Download Composer

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

### Composer Installation - Linux / Unix / OSX

Locally

```
php composer-setup.php --install-dir=bin --filename=composer
```

Globally

```
mv composer.phar /usr/local/bin/composer
```

### Composer Installation - Windows

##### Using the Installer

Download and run  [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe) t will install the latest Composer version and set up your PATH so that you can call composer from any directory in your command line.

##### Manual Installation

Change to a directory on your PATH and run the installer following [the Download page instructions](https://getcomposer.org/download/) to download composer.phar.

Create a new composer.bat file alongside composer.phar:

```
C:\bin>echo @php "%~dp0composer.phar" %*>composer.bat
```

Add the directory to your PATH environment variable if it isn't already

Close your current terminal. Test usage with a new terminal:

```
C:\Users\username>composer -V
Composer version 1.0.0 2016-01-10 20:34:53
```

## RUN the Game

To install all requirements packages

```
composer install
```

run this command and check the game on localhost:8000:

```
php -S localhost:8000
```

## TESTS

to run the tests:

```
./vendor/bin/phpunit
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details