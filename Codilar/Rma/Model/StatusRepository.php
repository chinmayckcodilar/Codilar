<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\StatusRepositoryInterface;
use Codilar\Rma\Model\ResourceModel\Status as StatusResource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Codilar\Rma\Api\Data\StatusInterface as Status;

/**
 * Class StatusRepository
 * @package Codilar\Rma\Model
 */
class StatusRepository implements StatusRepositoryInterface
{
    /**
     * @var StatusFactory
     */
    private $statusFactory;

    /**
     * @var StatusResource
     */
    private $statusResource;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;



    /**
     * StatusRepository constructor.
     * @param StatusFactory $statusFactory
     * @param StatusResource $statusResource
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        StatusFactory $statusFactory,
        StatusResource $statusResource,
        CollectionProcessorInterface $collectionProcessor,
    ) {
        $this->statusFactory = $statusFactory;
        $this->statusResource = $statusResource;
        $this->collectionProcessor = $collectionProcessor;
        // $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param Status $status
     * @return Status
     * @throws CouldNotSaveException
     */
    public function save(Status $status)
    {
        try {
            $this->statusResource->save($status);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the status: %1", $exception->getMessage()), $exception);
        }
        return $status;
    }

    /**
     * @param int $statusId
     * @return Status
     * @throws NoSuchEntityException
     */
    public function getById($statusId)
    {
        $status = $this->statusFactory->create();
        $this->statusResource->load($status, $statusId);
        if (!$status->getId()) {
            throw new NoSuchEntityException(__('Status with ID "%1" does not exist.', $statusId));
        }
        return $status;
    }

    /**
     * @param Status $status
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Status $status)
    {
        try {
            $this->statusResource->delete($status);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Could not delete the status with ID %1: %2", $status->getId(), $exception->getMessage()), $exception);
        }
        return true;
    }

    /**
     * @param int $statusId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($statusId)
    {
        $status = $this->getById($statusId);
        return $this->delete($status);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\Rma\Api\Data\StatusSearchResultsInterface
    */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        // $searchResults = $this->searchResultsFactory->create();
        // $searchResults->setSearchCriteria($searchCriteria);
        $collection = $this->statusFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
    
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
    
        return $searchResults;
    }
}    
