Roave\Realpath
==============

:warning: this library is not actually finished or functional, and may never be, it was an idea and it probably got forgotten :warning:

[![Build Status](https://travis-ci.org/Roave/Realpath.svg?branch=master)](https://travis-ci.org/Roave/Realpath) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Roave/Realpath/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Roave/Realpath/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/Roave/Realpath/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Roave/Realpath/?branch=master)

Roave\Realpath is an alternative implementation for PHP's built-in `realpath()`
function, that provides better feedback by way of throwing exceptions instead
of just silently returning false.

## Installation

Simply require using composer:

```shell
$ composer require roave/realpath
```

## Usage

```php
use Roave\Realpath\Realpath;

$myRealPath = Realpath::get($potentialPath);
```
