# TTT Cleaning Bot

## Small bot which will choose kitchen cleaners each week. 

###Setup

1. Install `composer` globally, then run `composer install` to install all dependencies.
1. Copy `.env.example` into `.env`.
1. Run `vendor/bin/phpunit` to run tests.

Note: Comment line `(new Notify())->notify(new TheChosenOnes($employee1, $employee2));` in `Cleaner.php` while testing so that Slack is not notified

### Using [Laravel](http://www.laravel.com).

### Made with love ❤

* [Felipe Peña](mailto:felipe.pena@ttt.studio)
* [Two Tall Totems](https://www.twotalltotems.com)


.