<?php

namespace Codilar\Rma\Model\ResourceModel\Reason;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

	protected $_idFieldName = 'reason_id';
	protected $_eventPrefix = 'codilar_reason_collection';
	protected $_eventObject = 'reason_collection';


	protected function _construct()
	{
		$this->_init('Codilar\Rma\Model\Reason', 'Codilar\Rma\Model\ResourceModel\Reason');
	}
}
