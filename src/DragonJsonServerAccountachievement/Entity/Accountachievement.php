<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAccountachievement
 */

namespace DragonJsonServerAccountachievement\Entity;

/**
 * Entityklasse einer Accountherausforderung
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="accountachievements")
 */
class Accountachievement extends \DragonJsonServerAchievement\Entity\AbstractAchievement
	implements \DragonJsonServerAchievement\Entity\LevelInterface
{
	use \DragonJsonServerAccount\Entity\AccountIdTrait;
	use \DragonJsonServerAchievement\Entity\LevelTrait;
	
	/**
	 * @Doctrine\ORM\Mapping\Id 
	 * @Doctrine\ORM\Mapping\Column(type="integer")
	 * @Doctrine\ORM\Mapping\GeneratedValue
	 **/
	protected $accountachievement_id;
	
	/**
	 * Gibt die ID der Accountherausforderung zurück
	 * @return integer
	 */
	public function getAccountachievementId()
	{
		return $this->accountachievement_id;
	}
	
	/**
	 * Gibt die Attribute der Accountherausforderung als Array zurück
	 * @return array
	 */
	public function toArray()
	{
		return parent::toArray() + [
			'accountachievement_id' => $this->getAccountachievementId(),
			'account_id' => $this->getAccountId(),
		];
	}
}
