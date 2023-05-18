<?php

namespace Codilar\Rma\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ReasonSearchResultsInterface
 * @package Codilar\Rma\Api\Data
 */
interface ReasonSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get reasons list.
     *
     * @return \Codilar\Rma\Api\Data\ReasonInterface[]
     */
    public function getItems();

    /**
     * Set reasons list.
     *
     * @param \Codilar\Rma\Api\Data\ReasonInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
