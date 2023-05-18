<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\Data\ReasonInterface;
use Codilar\Rma\Api\Data\ReasonSearchResultsInterface;
use Codilar\Rma\Api\Data\ReasonSearchResultsInterfaceFactory;
use Codilar\Rma\Api\ReasonRepositoryInterface;
use Codilar\Rma\Model\ResourceModel\Reason as ReasonResource;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class ReasonRepository
 * @package Codilar\Rma\Model
 */
class ReasonRepository implements ReasonRepositoryInterface
{
    /**
     * @var ReasonResource
     */
    private $reasonResource;

    /**
     * @var ReasonFactory
     */
    private $reasonFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var ReasonSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * ReasonRepository constructor.
     * @param ReasonResource $reasonResource
     * @param ReasonFactory $reasonFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ReasonSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ReasonResource $reasonResource,
        ReasonFactory $reasonFactory,
        CollectionProcessorInterface $collectionProcessor,
        ReasonSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->reasonResource = $reasonResource;
        $this->reasonFactory = $reasonFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save reason.
     *
     * @param ReasonInterface $reason
     * @return ReasonInterface
     * @throws CouldNotSaveException
     */
    public function save(ReasonInterface $reason)
    {
        try {
            $this->reasonResource->save($reason);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the reason: %1", $exception->getMessage()), $exception);
        }
        return $reason;
    }

    /**
     * Get reason by ID.
     *
     * @param int $reasonId
     * @return ReasonInterface
     * @throws NoSuchEntityException
     */
    public function getById($reasonId)
    {
        $reason = $this->reasonFactory->create();
        $this->reasonResource->load($reason, $reasonId);
        if (!$reason->getId()) {
            throw new NoSuchEntityException(__('Reason with ID "%1" does not exist.', $reasonId));
        }
        return $reason;
    }

    /**
     * Delete reason.
     *
     * @param ReasonInterface $reason
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ReasonInterface $reason)
    {
        try {
            $this->reasonResource->delete($reason);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Could not delete the reason with ID %1: %2", $reason->getId(), $exception->getMessage()), $exception);
        }
        return true;
    }

    /**
     * Delete reason by ID.
     *
     * @param int $reasonId
     * @return bool
     * @throwsCouldNotDeleteException
* @throws NoSuchEntityException
*/
public function deleteById($reasonId)
{
$reason = $this->getById($reasonId);
return $this->delete($reason);
}
/**
 * Retrieve reasons matching the specified criteria.
 *
 * @param SearchCriteriaInterface $searchCriteria
 * @return ReasonSearchResultsInterface
 */
public function getList(SearchCriteriaInterface $searchCriteria)
{
    $searchResults = $this->searchResultsFactory->create();
    $searchResults->setSearchCriteria($searchCriteria);

    $collection = $this->reasonFactory->create()->getCollection();
    $this->collectionProcessor->process($searchCriteria, $collection);

    $searchResults->setTotalCount($collection->getSize());
    $searchResults->setItems($collection->getItems());

    return $searchResults;
}

}