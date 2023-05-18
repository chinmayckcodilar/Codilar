<?php

namespace Codilar\Rma\Model;

class Reason extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'codilar_rma_reason';

	protected $_cacheTag = 'codilar_rma_reason';

	protected $_eventPrefix = 'codilar_rma_reason';


	protected function _construct()
	{
		$this->_init('Codilar\Rma\Model\ResourceModel\Reason');
	}
	public function getIdentities(){
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues(){
		$values = [];
		return $values;
	}
}