<?php

namespace Codilar\Rma\Model\ResourceModel\Status;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

	protected $_idFieldName = 'status_id';
	protected $_eventPrefix = 'codilar_status_collection';
	protected $_eventObject = 'status_collection';


	protected function _construct()
	{
		$this->_init('Codilar\Rma\Model\Status', 'Codilar\Rma\Model\ResourceModel\Status');
	}
}
