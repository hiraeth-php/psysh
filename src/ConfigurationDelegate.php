<?php

namespace Hiraeth\Psysh;

use Hiraeth;
use Psy;

/**
 *
 */
class ConfigurationDelegate implements Hiraeth\Delegate
{
	/**
	 *
	 */
	protected $config = NULL;


	/**
	 *
	 */
	public function __construct(Hiraeth\Configuration $config)
	{
		$this->config = $config;
	}

	/**
	 * Get the class for which the delegate operates.
	 *
	 * @static
	 * @access public
	 * @return string The class for which the delegate operates
	 */
	static public function getClass()
	{
		return 'Psy\Configuration';
	}


	/**
	 * Get the interfaces for which the delegate provides a class.
	 *
	 * @static
	 * @access public
	 * @return array A list of interfaces for which the delegate provides a class
	 */
	static public function getInterfaces()
	{
		return [];
	}


	/**
	 * Get the instance of the class for which the delegate operates.
	 *
	 * @access public
	 * @param Hiraeth\Broker $broker The dependency injector instance
	 * @return Object The instance of the class for which the delegate operates
	 */
	public function __invoke(Hiraeth\Broker $broker)
	{

		return new Psy\Configuration([
			'commands' => $this->config->get('psysh', 'commands', array())
		]);
	}
}
