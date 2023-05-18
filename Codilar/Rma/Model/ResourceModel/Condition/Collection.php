<?php

namespace Codilar\Rma\Model\ResourceModel\Condition;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

	protected $_idFieldName = 'condition_id';
	protected $_eventPrefix = 'codilar_condition_collection';
	protected $_eventObject = 'condition_collection';


	protected function _construct()
	{
		$this->_init('Codilar\Rma\Model\Condition', 'Codilar\Rma\Model\ResourceModel\Condition');
	}
}
