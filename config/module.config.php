<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAccountachievement
 */

/**
 * @return array
 */
return [
	'dragonjsonserveraccountachievement' => [
		'achievements' => [],
	],
	'dragonjsonserver' => [
	    'apiclasses' => [
	        '\DragonJsonServerAccountachievement\Api\Accountachievement' => 'Accountachievement',
	    ],
	],
	'service_manager' => [
		'invokables' => [
            '\DragonJsonServerAccountachievement\Service\Accountachievement' => '\DragonJsonServerAccountachievement\Service\Accountachievement',
		],
	],
	'doctrine' => [
		'driver' => [
			'DragonJsonServerAccountachievement_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => [
					__DIR__ . '/../src/DragonJsonServerAccountachievement/Entity'
				],
			],
			'orm_default' => [
				'drivers' => [
					'DragonJsonServerAccountachievement\Entity' => 'DragonJsonServerAccountachievement_driver'
				],
			],
		],
	],
];
