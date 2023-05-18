<?php

namespace Codilar\Rma\Api;

use Codilar\Rma\Api\Data\StatusInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface StatusRepositoryInterface
 * @package Codilar\Rma\Api
 */
interface StatusRepositoryInterface
{
    /**
     * Save status.
     *
     * @param StatusInterface $status
     * @return StatusInterface
     * @throws CouldNotSaveException
     */
    public function save(StatusInterface $status);

    /**
     * Retrieve status by id.
     *
     * @param int $statusId
     * @return StatusInterface
     * @throws NoSuchEntityException
     */
    public function getById($statusId);

    /**
     * Delete status.
     *
     * @param StatusInterface $status
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(StatusInterface $status);

    /**
     * Delete status by id.
     *
     * @param int $statusId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($statusId);

    /**
     * Retrieve statuses matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\StatusSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
