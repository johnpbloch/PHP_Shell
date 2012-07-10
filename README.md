PHP Shell
==

PHP Shell is a [PSR-0 compliant](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) library for executing shell commands in a shell environment of your choosing (`bash` and `sh` currently supported).

Requirements
--

 * PHP 5.3 or higher
 * `proc_open` and related functions

Installation
--

You may need to edit the `shell` executable file to change the location of your system's PHP binaries. By default, PHP Shell uses `/usr/bin/php`. Modify the first line of `PhpShell/shell` with the new location. Other than that, you should be able to drop this into your project and start using it in your code.

To find out where your system's PHP binary is, open a terminal window and run

    which php

Use
--

Use the static `exec()` method of any class that extends `\PhpShell\Shell`. The first argument (which is required) is the command to execute. Any additional arguments will be parsed into the command using `vsprintf()` (`vsprintf()` will only be run if there are more than one argument).

```<?php
use PhpShell\Bash;
// Using use:
echo Bash::exec('ls -la %s', escapeshellarg('.'));
// Using the fully qualified name:
echo \PhpShell\Sh::exec('git status');
```

(The code above assumes you have a PSR-0 compliant autoloader in place. If not, make sure you've included `PhpShell/Shell.php` as well as the file for the shell[s] you want to use.)

License
--

PHP Shell is licensed under the [GPL version 3 or later](http://www.gnu.org/copyleft/gpl.html).
