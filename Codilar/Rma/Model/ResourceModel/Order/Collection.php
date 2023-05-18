<?php

namespace Codilar\Rma\Model\ResourceModel\Order;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{

	protected $_idFieldName = 'rma_order_id';
	protected $_eventPrefix = 'codilar_order_collection';
	protected $_eventObject = 'order_collection';


	protected function _construct()
	{
		$this->_init('Codilar\Rma\Model\Order', 'Codilar\Rma\Model\ResourceModel\Order');
	}
}
