<?php

namespace Codilar\Rma\Api;

use Codilar\Rma\Api\Data\OrderInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface OrderRepositoryInterface
 * @package Codilar\Rma\Api
 */
interface OrderRepositoryInterface
{
    /**
     * Save order
     *
     * @param OrderInterface $order
     * @return OrderInterface
     * @throws LocalizedException
     */
    public function save(OrderInterface $order);

    /**
     * Get order by ID
     *
     * @param int $orderId
     * @return OrderInterface
     * @throws LocalizedException
     */
    public function getById($orderId);

    /**
     * Delete order
     *
     * @param OrderInterface $order
     * @return bool
     * @throws LocalizedException
     */
    public function delete(OrderInterface $order);

    /**
     * Delete order by ID
     *
     * @param int $orderId
     * @return bool
     * @throws LocalizedException
     */
    public function deleteById($orderId);

    /**
     * Retrieve orders matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\OrderSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Get Status by order id.
     *
     * @param int $orderId
     * @return OrderInterface
     * @throws NoSuchEntityException
     */
    public function getStatusByOrderId($orderId);


}
