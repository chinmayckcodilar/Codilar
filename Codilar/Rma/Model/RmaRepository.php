<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\Data\RmaInterface;
use Codilar\Rma\Api\RmaRepositoryInterface;
use Codilar\Rma\Model\ResourceModel\Rma as RmaResource;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class RmaRepository
 * @package Codilar\Rma\Model
 */
class RmaRepository implements RmaRepositoryInterface
{
    /**
     * @var RmaFactory
     */
    private $rmaFactory;

    /**
     * @var RmaResource
     */
    private $rmaResource;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;


    /**
     * RmaRepository constructor.
     * @param RmaFactory $rmaFactory
     * @param RmaResource $rmaResource
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        RmaFactory $rmaFactory,
        RmaResource $rmaResource,
        CollectionProcessorInterface $collectionProcessor
        
    ) {
        $this->rmaFactory = $rmaFactory;
        $this->rmaResource = $rmaResource;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param RmaInterface $rma
     * @return RmaInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaInterface $rma)
    {
        try {
            $this->rmaResource->save($rma);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the RMA: %1", $exception->getMessage()), $exception);
        }
        return $rma;
    }

    /**
     * @param int $rmaId
     * @return RmaInterface
     * @throws NoSuchEntityException
     */
    public function getById($rmaId)
    {
        $rma = $this->rmaFactory->create();
        $this->rmaResource->load($rma, $rmaId);
        if (!$rma->getId()) {
            throw new NoSuchEntityException(__('RMA with ID "%1" does not exist.', $rmaId));
        }
        return $rma;
    }

    /**
     * @param RmaInterface $rma
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaInterface $rma)
    {
        try {
            $this->rmaResource->delete($rma);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Could not delete the RMA with ID %1: %2", $rma->getId(), $exception->getMessage()), $exception);
        }
        return true;
    }

    /**
     * @param int $rmaId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
*/
public function deleteById($rmaId)
{
$rma = $this->getById($rmaId);
return $this->delete($rma);
}
/**
 * @param SearchCriteriaInterface $searchCriteria
 * @return RmaSearchResultsInterface
 */
public function getList(SearchCriteriaInterface $searchCriteria)
{

    $collection = $this->rmaFactory->create()->getCollection();
    $this->collectionProcessor->process($searchCriteria, $collection);

    $searchResults->setTotalCount($collection->getSize());
    $searchResults->setItems($collection->getItems());

    return $searchResults;
}

public function getByOrderId($orderId)
{
    $rma = $this->rmaFactory->create()->load($orderId,'order_id');
    // print_r($rma->getData());
    // die();
    //     $rma->addFieldToFilter('order_id', $orderId);
    //     if (!$rma->getEntityId()) {
    //         throw new NoSuchEntityException(__('RMA with order ID "%1" does not exist.', $orderId));
    //     }
        return $rma;
}
}