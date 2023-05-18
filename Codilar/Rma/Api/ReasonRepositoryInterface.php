<?php

namespace Codilar\Rma\Api;

use Codilar\Rma\Api\Data\ReasonInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface ReasonRepositoryInterface
 * @package Codilar\Rma\Api
 */
interface ReasonRepositoryInterface
{
    /**
     * Save reason.
     *
     * @param ReasonInterface $reason
     * @return ReasonInterface
     * @throws CouldNotSaveException
     */
    public function save(ReasonInterface $reason);

    /**
     * Get reason by ID.
     *
     * @param int $reasonId
     * @return ReasonInterface
     * @throws NoSuchEntityException
     */
    public function getById($reasonId);

    /**
     * Delete reason.
     *
     * @param ReasonInterface $reason
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ReasonInterface $reason);

    /**
     * Delete reason by ID.
     *
     * @param int $reasonId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($reasonId);

    /**
     * Retrieve reasons matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\ReasonSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
