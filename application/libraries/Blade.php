<?php
defined('BASEPATH') or exit('No direct script access allowed');

\Xiaoler\Blade\Autoloader::register();
use \Xiaoler\Blade\FileViewFinder;
use \Xiaoler\Blade\Factory;
use \Xiaoler\Blade\Compilers\BladeCompiler;
use \Xiaoler\Blade\Engines\CompilerEngine;
use \Xiaoler\Blade\Filesystem;
use \Xiaoler\Blade\Engines\EngineResolver;

class Blade
{

	public function __construct()
	{

		$path = array(APPPATH . 'views/');         // your view file path, it's an array
		$cachePath = FCPATH . 'storage/framework/views';     // compiled file path

		$file = new Filesystem;
		$compiler = new BladeCompiler($file, $cachePath);

		// you can add a custom directive if you want
		$compiler->directive('datetime', function($timestamp) {
			return preg_replace('/(\(\d+\))/', '<?php echo date("Y-m-d H:i:s", $1); ?>', $timestamp);
		});

		$resolver = new EngineResolver;
		$resolver->register('blade', function () use ($compiler) {
			return new CompilerEngine($compiler);
		});

		// get an instance of factory
		$this->factory = new Factory($resolver, new FileViewFinder($file, $path));

		// if your view file extension is not php or blade.php, use this to add it
		$this->factory->addExtension('tpl', 'blade');

		// render the template file and echo it
		// echo $this->factory->make('hello', ['a' => 1, 'b' => 2])->render();


		/*
		$path = [
			APPPATH . 'views/'
		];
		$cachePath = APPPATH . 'cache/views'; // 编译文件缓存目录

		$compiler = new \Xiaoler\Blade\Compilers\BladeCompiler($cachePath);
		$engine = new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
		$finder = new \Xiaoler\Blade\FileViewFinder($path);

		// 如果需要添加自定义的文件扩展，使用以下方法
		$finder->addExtension('php');

		// 实例化 Factory
		$this->factory = new \Xiaoler\Blade\Factory($engine, $finder);
		*/
	}

	public function view($path, $vars = [])
	{
		echo $this->factory->make($path, $vars);
	}

	public function exists($path)
	{
		return $this->factory->exists($path);
	}

	public function share($key, $value)
	{
		return $this->factory->share($key, $value);
	}

	public function render($path, $vars = [])
	{
		return $this->factory->make($path, $vars)->render();
	}
}
