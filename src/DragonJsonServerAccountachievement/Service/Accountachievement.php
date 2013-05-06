<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAccountachievement
 */

namespace DragonJsonServerAccountachievement\Service;

/**
 * Serviceklasse zur Verwaltung von Accountherausforderungen
 */
class Accountachievement
{
	use \DragonJsonServer\ServiceManagerTrait;
	use \DragonJsonServer\EventManagerTrait;
	use \DragonJsonServerDoctrine\EntityManagerTrait;

	/**
	 * Entfernt alle Accountherausforderungen mit der AccountID
	 * @param integer $account_id
	 * @return Accountachievement
	 */
	public function removeAccountachievementsByAccountId($account_id)
	{
		$entityManager = $this->getEntityManager();
		
		$entityManager
			->createQuery('
				DELETE FROM \DragonJsonServerAccountachievement\Entity\Accountachievement accountachievement
				WHERE accountachievement.account_id = :account_id
			')
			->execute(['account_id' => $account_id]);
	}
	
	/**
	 * Gibt die Accountherausforderung mit der AccountID und dem Gamedesign Identifier zurück
	 * @param integer $account_id
	 * @param string $gamedesign_identifier
	 * @return \DragonJsonServerAccountachievement\Entity\Accountachievement
	 * @throws \DragonJsonServer\Exception
	 */
	public function getAccountachievementByAccountIdAndGamedesignIdentifier($account_id, $gamedesign_identifier)
	{
		$entityManager = $this->getEntityManager();
	
		$accountachievement = $entityManager
			->getRepository('\DragonJsonServerAccountachievement\Entity\Accountachievement')
		    ->findOneBy(['account_id' => $account_id, 'gamedesign_identifier' => $gamedesign_identifier]);
		if (null === $accountachievement) {
			$achievements = $this->getServiceManager()->get('Config')['dragonjsonserveraccountachievement']['achievements'];
			if (!in_array($gamedesign_identifier, $achievements)) {
				throw new \DragonJsonServer\Exception('invalid gamedesign_identifier', ['gamedesign_identifier' => $gamedesign_identifier]);
			}
			$accountachievement = (new \DragonJsonServerAccountachievement\Entity\Accountachievement())
				->setAccountId($account_id)
				->setGamedesignIdentifier($gamedesign_identifier);
		}
		return $accountachievement;
	}

	/**
	 * Gibt die Accountherausforderungen mit der AccountID zurück
	 * @param integer $account_id
	 * @return array
	 */
	public function getAccountachievementsByAccountId($account_id)
	{
		$entityManager = $this->getEntityManager();
	
		return $entityManager
			->getRepository('\DragonJsonServerAccountachievement\Entity\Accountachievement')
		    ->findBy(['account_id' => $account_id]);
	}
	
	/**
	 * Aktualisiert die Accountherausforderung mit den übergebenen Daten
	 * @param integer $account_id
	 * @param string $gamedesign_identifier
	 * @param mixed $data
	 * @return \DragonJsonServerAccountachievement\Entity\Accountachievement
	 */
	public function changeAccountachievement($account_id, $gamedesign_identifier, $data)
	{
		$accountachievement = $this->getAccountachievementByAccountIdAndGamedesignIdentifier($account_id, $gamedesign_identifier);
		$this->getServiceManager()->get('Achievement')->changeAchievement($accountachievement, $data);
		return $accountachievement;
	}
}
