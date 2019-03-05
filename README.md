# TTT Cleaning Bot

## Small bot which will choose kitchen cleaners each week. 

### Using [Laravel](http://www.laravel.com).

### Made with love ❤

* [Felipe Peña](mailto:felipe.pena@twotalltotems.com)
* [Two Tall Totems](https://www.twotalltotems.com)


##Setup

Install `composer` globally, then run `composer install` to install all dependencies.

Copy `.env.example` into `.env`

Run `vendor/bin/phpunit` to run tests

Note: Comment line `(new Notify())->notify(new TheChosenOnes($employee1, $employee2));` in `Cleaner.php` while testing so that Slack is not notified.