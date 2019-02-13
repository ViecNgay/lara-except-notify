# Introduction
Notify to your slack channel when your project have exceptions

# Required
* laravel >= 5.4

# Usage
Step 1: Required to your project
Add your project via composer

`composer required phambinh/lara-except-notify`

Step 2: Register service provider
If you are using laravel 5.4, you have to open `config/app.php` and append providers

```php
'providers' => [
    ...
    Phambinh\Laraexcepnotify\ServiceProvider::class,
]
```

If you are using laravel 5.5 or higher, skip this step. Go to step 3

Step 3: Add event

Open `app/Exceptions/Handler.php` and go to `report` action, change to

```php
    // use Phambinh\Laraexcepnotify\Events\HasExceptionEvent;

    public function report(Exception $exception)
    {
        parent::report($exception);

        if ($this->shouldReport($exception)) {
            event(new HasExceptionEvent($exception));
        }
    }
```
