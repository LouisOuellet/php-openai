![GitHub repo logo](/dist/img/logo.png)

# phpOpenAI
![License](https://img.shields.io/github/license/LouisOuellet/php-openai?style=for-the-badge)
![GitHub repo size](https://img.shields.io/github/repo-size/LouisOuellet/php-openai?style=for-the-badge&logo=github)
![GitHub top language](https://img.shields.io/github/languages/top/LouisOuellet/php-openai?style=for-the-badge)
![Version](https://img.shields.io/github/v/release/LouisOuellet/php-openai?label=Version&style=for-the-badge)

## Features
  - Easy to use OpenAI cURL Library

## Why you might need it
If you are looking for an easy way to integrate OpenAI in your project. This PHP Class is for you.

## Can I use this?
Sure!

## License
This software is distributed under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html) license. Please read [LICENSE](LICENSE) for information on the software availability and distribution.

## Requirements
* PHP >= 5.6.0

## Security
Please disclose any vulnerabilities found responsibly – report security issues to the maintainers privately.

## Installation
Using Composer:
```sh
composer require laswitchtech/php-openai
```

## How do I use it?
In this documentations, we will use a table called users for our examples.

### Example
#### Initiate phpOpenAI
```php

//Import phpOpenAI class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpOpenAI\phpOpenAI;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate phpOpenAI
$phpOpenAI = new phpOpenAI('YOUR_API_KEY');
```

#### Request
```php

//Import phpOpenAI class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpOpenAI\phpOpenAI;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate phpOpenAI
$phpOpenAI = new phpOpenAI('YOUR_API_KEY');

//Request
$phpOpenAI->request([
  'model' => 'text-davinci-003',
  'prompt' => 'Say this is a test',
  'temperature' => 0,
  'max_tokens' => 7,
]); // Returns an array
```
