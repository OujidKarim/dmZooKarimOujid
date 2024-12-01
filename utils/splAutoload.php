<?php
/**
 * This file defines a function to autoload classes
 * using the PHP SPL function spl_autoload_register.
 * When a class is instantiated, this function will be
 * called and it will include the file containing the
 * class.
 */
spl_autoload_register(function ($class) {
	/**
	 * Replace backslashes (namespace separators) with
	 * forward slashes to create the path to the file
	 * containing the class.
	 */
	$class = str_replace('\\', '/', $class);

	/**
	 * Include the file containing the class. The file
	 * should be in the same directory as the class
	 * name.
	 */
	require "$class.php";
});

