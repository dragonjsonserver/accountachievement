<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAccountachievement
 */

namespace DragonJsonServerAccountachievement\Api;

/**
 * API Klasse zur Verwaltung von Accountherausforderungen
 */
class Accountachievement
{
	use \DragonJsonServer\ServiceManagerTrait;

	/**
	 * Gibt die Accountherausforderungen des aktuellen Accounts zurück
	 * @return array
	 * @DragonJsonServerAccount\Annotation\Session
	 */
	public function getAccountachievements()
	{
		$serviceManager = $this->getServiceManager();

		$session = $serviceManager->get('\DragonJsonServerAccount\Service\Session')->getSession();
		$serviceAccountachievement = $serviceManager->get('\DragonJsonServerAccountachievement\Service\Accountachievement');
		$accountachievements = $serviceAccountachievement->getAccountachievementsByAccountId($session->getAccountId()); 
		return $serviceManager->get('\DragonJsonServerDoctrine\Service\Doctrine')->toArray($accountachievements);
	}
}
