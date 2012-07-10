<?php
namespace Shell;

abstract class Shell
{

    const SHELL = 'sh';

    final public static function exec($command, $args = null)
    {
        $shell = static::SHELL;
        $binary = __DIR__ . '/shell';
        if ($args) {
            $command = "$command $args";
        }
        $command = trim($command);
        if (preg_match('/(^| )noRecursionPlease$/', $command)) {
            return '';
        }
        $output = `$binary $shell $command`;
        return $output;
    }

}
