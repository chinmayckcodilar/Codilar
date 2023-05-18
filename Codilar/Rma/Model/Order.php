<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\Data\OrderInterface;

class Order extends \Magento\Framework\Model\AbstractModel implements OrderInterface
{

	protected function _construct()
	{
		$this->_init(\Codilar\Rma\Model\ResourceModel\Order::class);
	}
	
	/**
     * Get Rma Order ID.
     *
     * @return int|null
     */
    public function getRmaId()
	{
        return $this->getData(self::RMA_ORDER_ID);
	}

     /**
     * Set Rma Order ID.
     *
     * @param int $id
     * @return $this
     */
    public function setRmaId($id)
	{
		return $this->setData(self::RMA_ORDER_ID, $id);
	}

    /**
     * Get Order ID.
     *
     * @return int|null
     */
    public function getOrderId()
	{
		return $this->getData(self::ORDER_ID);
	}

    /**
     * Set Rma Order ID.
     *
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId)
	{
		return $this->setData(self::ORDER_ID, $orderId);
	}

    /**
     * Get Status.
     *
     * @return string|null
    */
    public function getStatus()
	{
		return $this->getData(self::STATUS);
	}

    /**
     * Set Rma Order ID.
     *
     * @param string $status
     * @return $this
    */
    public function setStatus($status)
	{
		return $this->setData(self::STATUS, $status);
	}


    /**
     * Get Created At.
     *
     * @return string|null
    */
    public function getCreatedAt()
	{
		return $this->getData(self::CREATEDAT);
	}


     /**
     * Set Created At.
     *
     * @param string $createdAt
     * @return $this
    */
    public function setCreatedAt($createdAt){
		return $this->setData(self::CREATEDAT, $createdAt);
	}

    /**
     * Get Updated At.
     *
     * @return string|null
    */
    public function getUpdatedAt(){
		return $this->getData(self::UPDATEDAT);
	}

    /**
     * Set Updated At.
     *
     * @param string $updatedAt
     * @return $this
    */
    public function setUpdatedAt($updatedAt)
	{
		return $this->setData(self::UPDATEDAT, $updatedAt);
	}
}