<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use \App\Console\Commands\SOA\SoaGenerator;

class Soa extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'soa:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create SOA in your app.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		    $name = $this->argument('name');
            $generator = new SoaGenerator($this->option('package'));
            $generator->make($this->argument('name'));
            $this->info('Success!');
		    $this->info(' ');
            $this->info('Now add the following code to config/app.php:');
		    $this->info(' ');
            $this->info('// Into the provider section:');
		    $this->info(' ');
		    $this->info('...');
            $this->info('App\Repositories\\'.$name.'\\'.$name.'RepositoryServiceProvider::class,');
            $this->info('App\Services\\'.$name.'\\'.$name.'ServiceServiceProvider::class,');
		    $this->info('...');
            $this->info(' ');
		    $this->info('// into the alias section');
		    $this->info('...');
		    $this->info('\''.$name.'Service\' => App\Services\\'.$name.'\\'.$name.'Facade::class,');
		    $this->info('...');
	/*

	    App\Repositories\Participant\ParticipantRepositoryServiceProvider::class,


	 */
	}


	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
            
		return array(
			array('name', InputArgument::REQUIRED, 'Name of your SOA.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
            
            
		return array(
			array('package', null, InputOption::VALUE_OPTIONAL, 'Your package where you want to create SOA. For example: vendor/name', null),
		);
        
	}

}
