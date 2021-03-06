## Installation

s9e\\TextFormatter is developed on the latest version of PHP and is compatible with PHP 5.3.3 and above. In the following examples, you should replace `php5.3` with the lowest version of PHP you want to support: `php5.3`, `php5.4`, `php5.5` or `php5.6`. All versions are functionally identical.

Once installed, you can try this [basic example](https://github.com/s9e/TextFormatter/blob/master/docs/examples/00_quick.php).

### Direct download

Download a snapshot of the library from GitHub directly: [php5.3](https://github.com/s9e/TextFormatter/archive/release/php5.3.zip), [php5.4](https://github.com/s9e/TextFormatter/archive/release/php5.4.zip), [php5.5](https://github.com/s9e/TextFormatter/archive/release/php5.5.zip), [php5.6](https://github.com/s9e/TextFormatter/archive/release/php5.6.zip). Unpack the archive, rename the directory to "TextFormatter" (optional, but it looks nicer) and use the bundled autoloader.

```php
include 'TextFormatter/src/autoloader.php';
```

### Via Composer/[Packagist](https://packagist.org/)

Add the following to your `composer.json`. It will use Composer's autoloader normally.
```json
{
    "require": {
        "s9e/text-formatter": "dev-release/php5.3"
    }
}
```

### Via Git

Clone this repository and use the bundled autoloader.

```bash
git clone https://github.com/s9e/TextFormatter.git -b release/php5.3
```
```php
include 'TextFormatter/src/autoloader.php';
```
