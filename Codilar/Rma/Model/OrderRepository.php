<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\Data\OrderInterface;
use Codilar\Rma\Api\Data\OrderSearchResultsInterface;
use Codilar\Rma\Api\Data\OrderSearchResultsInterfaceFactory;
use Codilar\Rma\Api\OrderRepositoryInterface;
use Codilar\Rma\Model\ResourceModel\Order as OrderResource;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class OrderRepository
 * @package Codilar\Rma\Model
 */
class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var OrderResource
     */
    private $orderResource;

    /**
     * @var OrderFactory
     */
    private $orderFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var OrderSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * OrderRepository constructor.
     * @param OrderResource $orderResource
     * @param OrderFactory $orderFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param OrderSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        OrderResource $orderResource,
        OrderFactory $orderFactory,
        CollectionProcessorInterface $collectionProcessor,
        OrderSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->orderResource = $orderResource;
        $this->orderFactory = $orderFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save order.
     *
     * @param OrderInterface $order
     * @return OrderInterface
     * @throws CouldNotSaveException
     */
    public function save(OrderInterface $order)
    {
        try {
            $this->orderResource->save($order);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the order: %1", $exception->getMessage()), $exception);
        }
        return $order;
    }

    /**
     * Get order by ID.
     *
     * @param int $orderId
     * @return OrderInterface
     * @throws NoSuchEntityException
     */
    public function getById($orderId)
    {
        $order = $this->orderFactory->create();
        $this->orderResource->load($order, $orderId);
        if (!$order->getId()) {
            throw new NoSuchEntityException(__('Order with ID "%1" does not exist.', $orderId));
        }
        return $order;
    }

    /**
     * Delete order.
     *
     * @param OrderInterface $order
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(OrderInterface $order)
    {
        try {
            $this->orderResource->delete($order);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Could not delete the order with ID %1: %2", $order->getId(), $exception->getMessage()), $exception);
        }
        return true;
    }

    /**
     * Delete order by ID.
     *
     * @param int $orderId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
*/
public function deleteById($orderId)
{
$order = $this->getById($orderId);
return $this->delete($order);
}
/**
 * Retrieve orders matching the specified criteria.
 *
 * @param SearchCriteriaInterface $searchCriteria
 * @return OrderSearchResultsInterface
 */
public function getList(SearchCriteriaInterface $searchCriteria)
{
    $searchResults = $this->searchResultsFactory->create();
    $searchResults->setSearchCriteria($searchCriteria);

    $collection = $this->orderFactory->create()->getCollection();
    $this->collectionProcessor->process($searchCriteria, $collection);

    $searchResults->setTotalCount($collection->getSize());
    $searchResults->setItems($collection->getItems());

    return $searchResults;
}

 /**
     * Get Status by order id.
     *
     * @param int $orderId
     * @return OrderInterface
     * @throws NoSuchEntityException
     */
    public function getStatusByOrderId($orderId){
        return $this->orderFactory->create()->load($orderId,'order_id');
    }
}
