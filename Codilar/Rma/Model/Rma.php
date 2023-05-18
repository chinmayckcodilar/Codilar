<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\Data\RmaInterface;

class Rma extends \Magento\Framework\Model\AbstractModel implements RmaInterface
{

    protected function _construct()
    {
        $this->_init(\Codilar\Rma\Model\ResourceModel\Rma::class);
    }

    /**
     * Get Rma ID.
     *
     * @return int|null
     */
    public function getRmaId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set Rma ID.
     *
     * @param int $id
     * @return $this
     */
    public function setRmaId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get Order id.
     *
     * @return int|null
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * Set Order id.
     *
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }


    /**
     * Get Quantity.
     *
     * @return int|null
     */
    public function getQtyReturn()
    {
        return $this->getData(self::QTY_RETURN);
    }

    /**
     * Set Quantity.
     *
     * @param int $qtyReturn
     * @return $this
     */
    public function setQtyReturn($qtyReturn)
    {
        return $this->setData(self::QTY_RETURN, $qtyReturn);
    }

    /**
     * Get Reason.
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->getData(self::REASON);
    }

    /**
     * Set Reason.
     *
     * @param string $reason
     * @return $this
     */
    public function setReason($reason)
    {
        return $this->setData(self::REASON, $reason);
    }
    /**
     * Get Condition.
     *
     * @return string|null
     */
    public function getCondition(){
        return $this->getData(self::CONDITION);
    }

    /**
     * Set Condition.
     *
     * @param string $condition
     * @return $this
     */
    public function setCondition($condition){
        return $this->setData(self::CONDITION, $condition);

    }
    /**
     * Get Item id.
     *
     * @return int|null
     */
    public function getItemId(){
        return $this->getData(self::ITEM_ID);
    }

    /**
     * Set Item id.
     *
     * @param int $itemId
     * @return $this
     */
    public function setItemId($itemId){
        return $this->setData(self::ITEM_ID, $itemId);

    }

    /**
     * Get Created at.
     *
     * @return string|null
     */
    public function getCreatedAt(){
        return $this->getData(self::CREATED_AT);

    }

    /**
     * Set Created at.
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt){
        return $this->setData(self::CREATED_AT, $createdAt);

    }

    /**
     * Get Updated at.
     *
     * @return string|null
     */
    public function getUpdatedAt(){
        return $this->getData(self::UPDATED_AT);

    }

    /**
     * Set Updated at.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt){
        return $this->setData(self::UPDATED_AT, $updatedAt);

    }

}
