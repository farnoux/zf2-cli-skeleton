<?php
namespace Iadvize\Export\Controller;

use Zend\Console\Console;
use Zend\Console\Request as ConsoleRequest;
use Zend\Console\Exception\RuntimeException as ConsoleException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ConsoleModel;

class ExportController extends AbstractActionController
{

	public function indicatorAction() {

		$apiKey = $this->params()->fromRoute('api-key');
		$month  = $this->params()->fromRoute('month');

		// Retrieve and build data.
		$lines = $this->getServiceLocator()->get('indicator-service')
			->makeLines();

		// Export in CSV.
		$this->getServiceLocator()->get('csv-service')->outputCsv($lines, 'export');

		// Set request response.
		$request = $this->getRequest();

		if ($request instanceof ConsoleRequest) {
			$console = Console::getInstance();
			$console->write("File created.\n");

			return new ConsoleModel([ConsoleModel::RESULT => 'ok']);
		}

		throw new ConsoleException('Cannot handle request of type ' . get_class($request));
	}
}
