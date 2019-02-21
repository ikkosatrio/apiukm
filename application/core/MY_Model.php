<?php


class MY_Model extends Illuminate\Database\Eloquent\Model {
	
	public $ci;
	
	function __construct()
	{	
		$this->ci =& get_instance();
		$capsule = new Illuminate\Database\Capsule\Manager;

		$capsule->addConnection([
		    'driver'    => 'mysql',
		    'host'      => $_ENV['DB_HOST'],
		    'database'  => $_ENV['DB_NAME'],
		    'username'  => $_ENV['DB_USERNAME'],
		    'password'  => $_ENV['DB_PASSWORD'],
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => '',
		]);

		// Set the event dispatcher used by Eloquent models... (optional)
		$capsule->setEventDispatcher(new Illuminate\Events\Dispatcher(new Illuminate\Container\Container));

		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();

		/*$connection = $capsule->getConnection();
		$connection->beginTransaction();

		$GLOBALS['capsule'] =  $capsule;*/
	}

	public function scopeDesc($query)
	{
		return $query->orderBy('id', 'desc');
	}

	public function scopeAsc($query)
	{
		return $query->orderBy('id', 'asc');
	}
}