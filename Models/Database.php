<?php

/**
 * A singleton class to handle database connections using PDO.
 *
 * The class uses a static instance to ensure that only one connection
 * is established to the database.
 *
 * @package  Zoomanager
 * @author   Pierre-Henry Soria <ph7software@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 */
namespace Models;

use \PDO as PDO;

class Database
{
	/**
	 * A static instance of the class.
	 *
	 * @var Database
	 */
	private static $instance = null;

	/**
	 * The PDO instance.
	 *
	 * @var PDO
	 */
	protected $db = null;

	/**
	 * Initialize the class.
	 *
	 * Create a new PDO instance if it doesn't exist yet.
	 */
	public function __construct()
	{
		if (!self::$instance) {
			self::$instance = new PDO('mysql:dbname=zoomanagerdb;host=localhost;charset=utf8', 'root', '', [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
		}


		$this->db = self::$instance;
	}
}

