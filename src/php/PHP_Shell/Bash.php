<?php

/**
 * Bash.php
 *
 * This file creates a Bash shell wrapper from the Shell class.
 *
 * @author John P. Bloch <john@avendimedia.com>
 * @version @@PACKAGE_VERSION@@
 * @license http://www.gnu.org/copyleft/gpl.html GPLv3 or later
 */
namespace PHP_Shell;

class Bash extends Shell
{
	/**
	 * Define our shell invocation command. Use the login shell invocation so
	 * the current user's environment is loaded
	 *
	 * @link http://linux.about.com/library/cmd/blcmdl1_sh.htm#lbAH Bash Invocation
	 * @since 1.0
	 */

	const SHELL = '"bash --login"';

}
