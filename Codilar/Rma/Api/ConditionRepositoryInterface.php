<?php

namespace Codilar\Rma\Api;

use Codilar\Rma\Model\Condition;
use Codilar\Rma\Api\Data\ConditionInterface;


/**
 * Interface ConditionRepositoryInterface
 * @package Codilar\Rma\Api
 */
interface ConditionRepositoryInterface
{
    /**
     * Save Condition.
     *
     * @param ConditionInterface $condition
     * @return ConditionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(ConditionInterface $condition);

    /**
     * Get Condition by id.
     *
     * @param int $conditionId
     * @return Condition
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($conditionId);

    /**
     * Delete Condition.
     *
     * @param Condition $condition
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Condition $condition);

    /**
     * Delete Condition by id.
     *
     * @param int $conditionId
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($conditionId);

    /**
     * Retrieve Conditions matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\ConditionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
