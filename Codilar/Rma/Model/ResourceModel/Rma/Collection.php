<?php

namespace Codilar\Rma\Model\ResourceModel\Rma;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

	protected $_idFieldName = 'rma_id';
	protected $_eventPrefix = 'codilar_rma_collection';
	protected $_eventObject = 'rma_collection';


	protected function _construct()
	{
		$this->_init('Codilar\Rma\Model\Rma', 'Codilar\Rma\Model\ResourceModel\Rma');
	}
}
