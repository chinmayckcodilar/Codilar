<?php

namespace Codilar\Rma\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface RmaSearchResultsInterface
 * @package Codilar\Rma\Api\Data
 */
interface RmaSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get RMA list.
     *
     * @return \Codilar\Rma\Api\Data\RmaInterface[]
     */
    public function getItems();

    /**
     * Set RMA list.
     *
     * @param \Codilar\Rma\Api\Data\RmaInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
