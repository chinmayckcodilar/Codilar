<?php

namespace Codilar\Rma\Api\Data;

/**
 * Interface ConditionInterface
 * @package Codilar\Rma\Api\Data
 */
interface RmaInterface
{
    const ID = 'rma_id';
    const ORDER_ID = 'order_id';
    const QTY_RETURN = 'qty_return';
    const REASON = 'reason';
    const CONDITION = 'condition';
    const ITEM_ID = 'item_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get Rma ID.
     *
     * @return int|null
     */
    public function getRmaId();

    /**
     * Set Rma ID.
     *
     * @param int $id
     * @return $this
     */
    public function setRmaId($id);

    /**
     * Get Order id.
     *
     * @return int|null
     */
    public function getOrderId();

    /**
     * Set Order id.
     *
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * Get Quantity.
     *
     * @return int|null
     */
    public function getQtyReturn();

    /**
     * Set Quantity.
     *
     * @param int $qtyReturn
     * @return $this
     */
    public function setQtyReturn($qtyReturn);

    /**
     * Get Reason.
     *
     * @return string|null
     */
    public function getReason();

    /**
     * Set Reason.
     *
     * @param string $reason
     * @return $this
     */
    public function setReason($reason);

    /**
     * Get Condition.
     *
     * @return string|null
     */
    public function getCondition();

    /**
     * Set Condition.
     *
     * @param string $condition
     * @return $this
     */
    public function setCondition($condition);

    /**
     * Get Item id.
     *
     * @return int|null
     */
    public function getItemId();

    /**
     * Set Item id.
     *
     * @param int $itemId
     * @return $this
     */
    public function setItemId($itemId);

    /**
     * Get Created at.
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set Created at.
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Updated at.
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set Updated at.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);


}
