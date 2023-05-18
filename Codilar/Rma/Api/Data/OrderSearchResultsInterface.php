<?php

namespace Codilar\Rma\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface OrderSearchResultsInterface
 * @package Codilar\Rma\Api\Data
 */
interface OrderSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get orders list.
     *
     * @return \Codilar\Rma\Api\Data\OrderInterface[]
     */
    public function getItems();

    /**
     * Set orders list.
     *
     * @param \Codilar\Rma\Api\Data\OrderInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
