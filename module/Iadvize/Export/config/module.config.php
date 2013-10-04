<?php
/**
 *
 * @package Export
 */
return [
	'controllers' => [
		'invokables' => [
			'export' => 'Iadvize\Export\Controller\ExportController',
		],
	],

	'router' => [
		'routes' => [],
	],

	'console' => [
		'router' => [
			'routes' => [
				'export' => [
					'type' => 'Zend\Mvc\Router\Console\Simple',
					'options' => [
						'route' => 'export (indicator):action --api-key= --month=',
						'defaults' => [
							'controller' => 'export',
							'action'     => 'indicator',
						],
					],
				],
			],
		],
	],

	'service_manager' => [
		'invokables' => [
			'csv-service'       => 'Iadvize\Export\Service\CsvService',
			'indicator-service' => 'Iadvize\Export\Service\IndicatorService',
		],
	]
];
