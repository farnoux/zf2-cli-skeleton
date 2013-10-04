<?php
namespace Iadvize\Export;

use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;

/**
 * Module Bootstrap
 */
class Module implements
	ConsoleBannerProviderInterface,
	ConsoleUsageProviderInterface
{

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					'Iadvize\Export' => __DIR__ . '/src/Iadvize/Export',
				),
			),
		);
	}

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	/**
	 * Set a header to console.
	 *
	 * @see ConsoleBannerProviderInterface::getConsoleBanner
	 */
	public function getConsoleBanner(Console $console) {
		return
			"=----------------------------------------------------=\n" .
			"=                     \ EXPORT /                     =\n" .
			"=----------------------------------------------------=\n"
			;
	}

	/**
	 * Define console usage if necessary.
	 *
	 * @see ConsoleUsageProviderInterface::getConsoleUsage
	 */
	public function getConsoleUsage(Console $console) {
		return [
			'export indicator --api-key= --month='
		];
	}
}
