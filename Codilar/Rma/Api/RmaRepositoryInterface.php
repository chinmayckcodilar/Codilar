<?php

namespace Codilar\Rma\Api;

use Codilar\Rma\Api\Data\RmaInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface RmaRepositoryInterface
 * @package Codilar\Rma\Api
 */
interface RmaRepositoryInterface
{
    /**
     * Save RMA.
     *
     * @param RmaInterface $rma
     * @return RmaInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaInterface $rma);

    /**
     * Get RMA by ID.
     *
     * @param int $rmaId
     * @return RmaInterface
     * @throws NoSuchEntityException
     */
    public function getById($rmaId);

    /**
     * Get RMA by order id.
     *
     * @param int $orderId
     * @return RmaInterface
     * @throws NoSuchEntityException
     */
    public function getByOrderId($orderId);

    /**
     * Delete RMA.
     *
     * @param RmaInterface $rma
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaInterface $rma);

    /**
     * Delete RMA by ID.
     *
     * @param int $rmaId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($rmaId);

    /**
     * Retrieve RMA list matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\RmaSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
