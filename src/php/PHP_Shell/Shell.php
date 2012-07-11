<?php

/**
 * Shell.php
 *
 * This file defines the abstract Shell class that various shell implementations
 * will extend.
 *
 * @author John P. Bloch <john@avendimedia.com>
 * @version @@PACKAGE_VERSION@@
 * @license http://www.gnu.org/copyleft/gpl.html GPLv3 or later
 */
namespace PHP_Shell;

abstract class Shell
{
    /**
     * This constant will be used as the shell invocation command.
     *
     * Since it will be opened with PHP's proc_open() function, this is the
     * command you would use to open an instance of the shell, not to execute a
     * command without opening a new process. For example, using the Bourne
     * shell, to execute a command without opening a new process, you would do
     *
     *     sh -c "foo bar"
     *
     * However, since we're opening a new process and then executing a command,
     * it suffices to use simply
     *
     *     sh
     *
     * @since 1.0
     */

    const SHELL = 'sh';

    /**
     * Executes a command in the class' specified shell.
     *
     * You do not need to run the command through escapeshellcmd(). The
     * executable file will do this for you before actually running your
     * command.
     *
     * If the optional $args parameter is used, it will be appended to the
     * command, separated by a space. It will not be escaped. Any values that
     * need escaping should be run through escapeshellarg() beforehand.
     *
     * Errors and output from the command, if any, will be returned in that
     * order.
     *
     * @see escapeshellcmd()
     * @see escapeshellarg()
     * @since 1.0
     * @param string $command The command to execute
     * @param string $args Optional arguments to append to the command
     * @return string The error or output information from the command (if any)
     */
    final public static function exec($command)
    {
        $shell = static::SHELL;
        $binary = '@@BIN_DIR@@/php-shell';
        if (func_num_args() > 1) {
            $command = vsprintf($command, array_slice(func_get_args(), 1));
        }
        $command = trim($command);
        // Don't bother running if the command wouldn't run anyway.
        if (preg_match('/(^| )noRecursionPlease$/', $command)) {
            return '';
        }
        $output = `$binary $shell $command`;
        return $output;
    }

}
