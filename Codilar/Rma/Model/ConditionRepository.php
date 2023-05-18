<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\ConditionRepositoryInterface;
use Codilar\Rma\Model\ConditionFactory;
use Codilar\Rma\Model\ResourceModel\Condition as ConditionResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;


/**
 * Class ConditionRepository
 * @package Codilar\Rma\Model
 */
class ConditionRepository implements ConditionRepositoryInterface
{
    /**
     * @var ConditionFactory
     */
    private $conditionFactory;

    /**
     * @var ConditionResource
     */
    private $conditionResource;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * ConditionRepository constructor.
     * @param ConditionFactory $conditionFactory
     * @param ConditionResource $conditionResource
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ConditionFactory $conditionFactory,
        ConditionResource $conditionResource,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->conditionFactory = $conditionFactory;
        $this->conditionResource = $conditionResource;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param Condition $condition
     * @return Condition
     * @throws CouldNotSaveException
     */
    public function save($condition)
    {
        try {
            $this->conditionResource->save($condition);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the condition: %1", $exception->getMessage()), $exception);
        }
        return $condition;
    }

    /**
     * @param int $conditionId
     * @return Condition
     * @throws NoSuchEntityException
     */
    public function getById($conditionId)
    {
        $condition = $this->conditionFactory->create();
        $this->conditionResource->load($condition, $conditionId);
        if (!$condition->getId()) {
            throw new NoSuchEntityException(__('Condition with ID "%1" does not exist.', $conditionId));
        }
        return $condition;
    }

    /**
     * @param Condition $condition
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Condition $condition)
    {
        try {
            $this->conditionResource->delete($condition);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Could not delete the condition with ID %1: %2", $condition->getId(), $exception->getMessage()), $exception);
        }
        return true;
    }

    /**
     * @param int $conditionId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($conditionId)
    {
        $condition = $this->getById($conditionId);
        return $this->delete($condition);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\ConditionSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $collection = $this->conditionFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}