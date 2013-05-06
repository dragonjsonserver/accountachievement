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

		$session = $serviceManager->get('Session')->getSession();
		$accountachievements = $serviceManager->get('Accountachievement')->getAccountachievementsByAccountId($session->getAccountId()); 
		return $serviceManager->get('Doctrine')->toArray($accountachievements);
	}
}
