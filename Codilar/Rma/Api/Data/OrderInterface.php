<?php

namespace Codilar\Rma\Api\Data;

/**
 * Interface ConditionInterface
 * @package Codilar\Rma\Api\Data
 */
interface OrderInterface
{
    CONST RMA_ORDER_ID = 'rma_order_id';
    CONST ORDER_ID = 'order_id';
    CONST STATUS = 'status';
    CONST CREATED_AT = 'created_at';
    CONST UPDATED_AT = 'updated_at';

    /**
     * Get Rma Order ID.
     *
     * @return int|null
     */
    public function getRmaId();

     /**
     * Set Rma Order ID.
     *
     * @param int $id
     * @return $this
     */
    public function setRmaId($id);

    /**
     * Get Order ID.
     *
     * @return int|null
     */
    public function getOrderId();

    /**
     * Set Rma Order ID.
     *
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * Get Status.
     *
     * @return string|null
    */
    public function getStatus();

    /**
     * Set Rma Order ID.
     *
     * @param string $status
     * @return $this
    */
    public function setStatus($status);


    /**
     * Get Created At.
     *
     * @return string|null
    */
    public function getCreatedAt();


     /**
     * Set Created At.
     *
     * @param string $createdAt
     * @return $this
    */
    public function setCreatedAt($createdAt);

    /**
     * Get Updated At.
     *
     * @return string|null
    */
    public function getUpdatedAt();

    /**
     * Set Updated At.
     *
     * @param string $updatedAt
     * @return $this
    */
    public function setUpdatedAt($updatedAt);


}