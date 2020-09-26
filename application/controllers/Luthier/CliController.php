<?php

use Luthier\RouteBuilder as Route;
use Luthier\Utils;

defined('BASEPATH') OR exit('No direct script access allowed');

class CliController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Inflect');
	}

	/**
	 * Registers the 'migrate' command
	 *
	 * @param string $version (Optional)
	 * @param bool $seed (Optional)
	 * @return void
	 */
	public static function migrations($version = null, $seed = false)
	{
		if(ENVIRONMENT !== 'development') {
			return;
		}

		self::migrate($version);

		$seed = self::arg('seed') === true;

		if($seed) {
			self::seed();
		}
	}

	/**
	 * Registers the 'seed' command
	 * @return void
	 */
	public static function seeds()
	{
		if(ENVIRONMENT !== 'development') {
			return;
		}
		self::seed();
	}

	/**
	 * Parses a CLI agument
	 *
	 * @param string $name    Parameter value
	 * @param mixed  $default Default parameter value
	 * @internal
	 *
	 * @return boolean|array|string
	 */
	private static function arg($name, $default = null)
	{
		foreach($_SERVER['argv'] as $arg){
			$find = '--' . $name;
			if(substr($arg, 0, strlen($find)) == $find){
				if($arg == $find){
					return true;
				}
				if(count(explode(':',$arg)) == 2){
					list(,$value) = explode(':',$arg);
					return $value;
				}
			}
		}
		return $default;
	}

	/**
	 * Creates a controller
	 *
	 * To create a resource controller with common CRUD operations structure,
	 * use the --resource parameter. Example:
	 *
	 *   php artisan make:controller Airplanes --resource
	 *
	 * (For HMVC users) To specify the module name, use the --module:[name]
	 * parameter. Example:
	 *
	 *   php artisan make:controller Invoice --module:MyModule
	 *
	 *   ... you can also create a new resource module controller:
	 *
	 *   php artisan make:controller Invoice --module:MyModule --resource
	 *
	 * @param  string $name Controller name
	 *
	 * @return void
	 */
	public function makeContoller($name, $resource = false) {
		$resource = self::arg('resource') === true;
		$module = self::arg('module');

		if(!is_string($module) || empty($module)) {
			$module = null;
		}

		$subFolder = null;
		$name = ucfirst($name) . 'Controller';

		if(count(explode('/', $name)) > 0) {
			$subFolder = explode('/', $name);
			$name = array_pop($subFolder);
			$subFolder = implode('/', $subFolder);
		}

		$path = APPPATH . (!empty($module) ? 'modules/' . $module . '/' : '' ) . 'controllers/' . (!empty($subFolder) ? $subFolder . '/' : '' );

		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}

		if(file_exists($path . '/' . $name . '.php'))
		{
			show_error('The file already exists!');
		}

		$file = <<<CONTROLLER
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class $name extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    %CONTROLLER_BODY%
}
CONTROLLER;


		if(!$resource)
		{
			$controllerBody ='
    /**
     * Index action
     */
    public function index()
    {

    }
';
		}
		else
		{
			$controllerBody = '
    /**
     * Index action
     */
    public function index()
    {

    }

    /**
     * Create action
     */
    public function create()
    {

    }

    /**
     * Store action
     */
    public function store()
    {

    }

    /**
     * Show action
     *
     * @param  string  $id
     */
    public function show($id)
    {

    }

    /**
     * Edit action
     *
     * @param  string  $id
     */
    public function edit($id)
    {

    }

    /**
     * Update action
     *
     * @param  string  $id
     */
    public function update($id)
    {

    }

    /**
     * Destroy action
     *
     * @param  string $id
     */
    public function destroy($id)
    {

    }
';
		}

		$file = str_ireplace('%CONTROLLER_BODY%', $controllerBody, $file);

		file_put_contents($path . '/' . $name . '.php', $file);

		echo "\nCREATED:\n" . realpath($path . '/' . $name . '.php') . "\n";
	}

	/**
	 * Creates a model
	 *
	 * (For HMVC users) To specify the module name, use the --module:[name]
	 * parameter. Example:
	 *
	 *   php artisan make:model ModelName --module:MyModule
	 *
	 * @param  string $name Model name
	 *
	 * @return void
	 */
	public function makeModel($name)
	{
		$module = self::arg('module');

		if(!is_string($module) || empty($module)) {
			$module = null;
		}

		$subFolder = null;
		$name = ucfirst($name) . '_model';

		if(count(explode('/', $name)) > 0) {
			$subFolder = explode('/', $name);
			$name = array_pop($subFolder);
			$subFolder = implode('/', $subFolder);
		}

		$path = APPPATH . (!empty($module) ? 'modules/' . $module . '/' : '' ) . 'models/' . (!empty($subFolder) ? $subFolder . '/' : '' );

		if(!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		if(file_exists($path . '/' . $name . '.php')) {
			show_error('The file already exists!');
		}

		$variables = PHP_EOL;
		$variables .= '	public $table = \'\';'  .  PHP_EOL;
		$variables .= '	public $primary_key = \'\';'  .  PHP_EOL;

		$constructor = 'parent::__construct();'  .  PHP_EOL;
		$constructor .= '		$this->load->database();';

		$file = <<<MODEL
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class $name extends MY_Model
{
	{$variables}
	public function __construct()
	{
		{$constructor}
    }
}
MODEL;

		file_put_contents($path . '/' . $name . '.php', $file);

		echo "\nCREATED:\n" . realpath($path . '/' . $name . '.php') . "\n";
	}

	/**
	 * Creates a library
	 *
	 * @param  string $name Library name
	 *
	 * @return void
	 */
	public function makeLibrary($name)
	{
		$module = self::arg('module');

		if(!is_string($module) || empty($module)){
			$module = null;
		}

		$subFolder = null;
		$name = ucfirst($name);

		if(count(explode('/', $name)) > 0) {
			$subFolder = explode('/', $name);
			$name = array_pop($subFolder);
			$subFolder = implode('/', $subFolder);
		}

		$path = APPPATH . (!empty($module) ? 'modules/' . $module . '/' : '' ) . 'libraries/' . (!empty($subFolder) ? $subFolder . '/' : '' );

		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}

		if(file_exists($path . '/' . $name . '.php'))
		{
			show_error('The file already exists!');
		}

		$file = <<<LIBRARY
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class $name
{

}
LIBRARY;

		file_put_contents($path . '/' . $name . '.php', $file);

		echo "\nCREATED:\n" . realpath($path . '/' . $name . '.php') . "\n";
	}



	/**
	 * Creates a helper
	 *
	 * (For HMVC users) To specify the module name, use the --module:[name]
	 * parameter. Example:
	 *
	 *   php artisan make:helper MyHelper --module:MyModule
	 *
	 * @param  string $name Helper name
	 *
	 * @return void
	 */
	public function makeHelper($name)
	{
		$module = self::arg('module');

		if(!is_string($module) || empty($module)){
			$module = null;
		}

		$subFolder = null;
		$only_name = strtolower($name);
		$name = $only_name . '_helper';

		if(count(explode('/', $name)) > 0) {
			$subFolder = explode('/', $name);
			$name = array_pop($subFolder);
			$subFolder = implode('/', $subFolder);
		}

		$path = APPPATH . (!empty($module) ? 'modules/' . $module . '/' : '' ) . 'helpers/' . (!empty($subFolder) ? $subFolder . '/' : '' );

		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}

		if(file_exists($path . '/' . $name . '.php')) {
			show_error('The file already exists!');
		}

		$file = <<<HELPER
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('{$only_name}')) {
	function {$only_name}() {
	
	}
}

HELPER;

		file_put_contents($path . '/' . $name . '.php', $file);

		echo "\nCREATED:\n" . realpath($path . '/' . $name . '.php') . "\n";
	}


	/**
	 * Creates a middleware
	 *
	 * @param string $name Middleware name
	 *
	 * @return void
	 */
	public function makeMiddleware($name)
	{
		$dir = array();

		if(count(explode('/', $name)) > 0) {
			$dir  = explode('/', $name);
			$name = array_pop($dir);
		}

		$name = ucfirst($name) . 'Middleware';
		$path = APPPATH . 'middleware/' . ( empty($dir) ? $name : implode('/', $dir) . '/' . $name ) . '.php';

		if(!empty($dir)) {
			Utils::rmkdir($dir,'middleware');
		}

		if(file_exists($path)) {
			show_error('The file already exists!');
		}

		$file = <<<MIDDLEWARE
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class $name implements Luthier\MiddlewareInterface
{

    /**
     * Middleware entry point
     *
     * @return void
     */
    public function run(\$args = [])
    {

    }
}
MIDDLEWARE;

		file_put_contents($path, $file);

		echo "\nCREATED:\n" . realpath($path) . "\n";
	}



	public function makeMigration($name, $type = 'timestamp')
	{
		if(!file_exists(APPPATH . '/database/migrations')) {
			mkdir(APPPATH . '/database/migrations');
		}

		$name = trim(str_ireplace(' ', '_', $name));

		if($type == 'timestamp') {
			$filename = date('Y') . date('m') . date('d') . date('H') . date('i') . date('s') . '_create_' . $name . '_table';
		} else {
			$migrations = scandir(APPPATH . '/database/migrations');
			$last = 0;

			foreach($migrations as $migration) {
				if($migration == '.' || $migration == '..') {
					continue;
				}

				$_number = substr($migration,0,4);

				if(preg_match('/^[0-9]{3}_$/',$_number)) {
					if($_number > $last) {
						$last = (int) $_number;
					}
				}
			}
			$last++;
			$filename = str_pad($last, 3, '0', STR_PAD_LEFT) . '_create_' . $name . '_table';
		}

		$path = APPPATH . 'database/migrations/' . $filename . '.php';

		if(file_exists($path)) {
			show_error('The file already exists!');
		}

		$function_up = PHP_EOL;
		$function_up .= '		$this->dbforge->add_field(\'id\');'  .  PHP_EOL;
		$function_up .= '		$this->dbforge->timestamps();'  .  PHP_EOL;
		$function_up .= '		$this->dbforge->create_table($'.'this->_table_name, TRUE);';

		$function_down = PHP_EOL;
		$function_down .= '		$this->dbforge->drop_table($this->_table_name, TRUE);'  .  PHP_EOL;

		$function_constructor = PHP_EOL;
		$function_constructor .= '		parent::__construct();'  .  PHP_EOL;
		$function_constructor .= '		$this->load->dbforge();'  .  PHP_EOL;
		$protected_variable = 'protected $_table_name = "'.$name.'";'  .  PHP_EOL;

		$file = <<<MIGRATION
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_{$name}_table extends CI_Migration
{
    /**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	{$protected_variable}

	public function __construct()
	{
		{$function_constructor}
    }
    
    public function up()
    {
        {$function_up}
    }

    public function down()
    {
        {$function_down}
    }
}
MIGRATION;

		file_put_contents($path, $file);

		echo "\nCREATED:\n" . realpath($path) . "\n";

	}


	/**
	 * Creates a seeder
	 *
	 * (For HMVC users) To specify the module name, use the --module:[name]
	 * parameter. Example:
	 *
	 *   php artisan make:seeder SeederName --module:MyModule
	 *
	 * @param  string $name Seeder name
	 *
	 * @return void
	 */
	public function makeSeeder($name)
	{
		if(!file_exists(APPPATH . '/database/seeds')) {
			mkdir(APPPATH . '/database/seeds');
		}

		$subFolder = null;
		$lower_name = $this->inflect->pluralize($name);
		$name = ucfirst($name) . 'Seeder';

		if(count(explode('/', $name)) > 0) {
			$subFolder = explode('/', $name);
			$name = array_pop($subFolder);
			$subFolder = implode('/', $subFolder);
		}

		$path = APPPATH . 'database/seeds/' . $name . '.php';

		if(file_exists($path)) {
			show_error('The file already exists!');
		}

		$variables = PHP_EOL;
		$variables .= '	private $table = "'.$lower_name.'";'  .  PHP_EOL;

		$function = '$'.$lower_name.'_data = array();'  .  PHP_EOL;
		$function .= '		$this->db->insert($this->table, $'.$lower_name.'_data);';

		$file = <<<SEEDER
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class $name extends Seeder
{
	{$variables}
	public function run()
	{
		{$function}
    }
}
SEEDER;

		file_put_contents($path, $file);

		echo "\nCREATED:\n" . realpath($path) . "\n";
	}

	/**
	 * Runs a migration
	 *
	 * @param  string  $version (Optional)
	 *
	 * @return void
	 */
	private static function migrate($version = null)
	{
		if($version == 'reverse') {
			self::migrate('0');
			return;
		}

		if($version == 'refresh') {
			self::migrate('0');
			self::migrate();
			return;
		}

		ci()->load->library('migration');

		$migrations = ci()->migration->find_migrations();

		$_migrationsTable = new \ReflectionProperty('CI_Migration', '_migration_table');
		$_migrationsTable->setAccessible(true);
		$_migrationsTable = $_migrationsTable->getValue(ci()->migration);

		$old = ci()->db->get($_migrationsTable)->result()[0]->version;

		$migrate = function() use($version) {
			if($version === null) {
				return ci()->migration->latest();
			}

			return ci()->migration->version($version);
		};

		$result = $migrate();

		if($result === FALSE) {
			show_error(ci()->migration->error_string());
		}

		$current = ci()->db->get($_migrationsTable)->result()[0]->version;

		echo "\n";

		if($old == $current) {
			echo "Nothing to migrate. \n";
		} else {
			$migrated   = array();
			$index      = 0;
			$migrations = $old < $current ? $migrations : array_reverse($migrations, true);
			$ascendent  = $old < $current;

			foreach($migrations as $name => $path) {
				if($ascendent) {
					if( $current >=  $name) {
						echo 'MIGRATED: ' . basename($migrations[$name]) . "\n";
					}
				} else {
					if( $current <= $name) {
						echo 'REVERSED: ' . basename($migrations[$name]) . "\n";
					}
				}
			}
		}
	}

	/**
	 * Runs a seed
	 *
	 * @return void
	 */
	private static function seed()
	{
		ci()->seeder->call('DatabaseSeeder');
		echo 'DatabaseSeeder seeding successfully!';
	}
}
