<?php
namespace Codilar\ProductList\Block;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;

class ProductList extends \Magento\Framework\View\Element\Template
{
    protected $_collectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_collectionFactory = $collectionFactory;
    }

    public function getProductCollection()
    {
        $collection = $this->_collectionFactory->create();
        $collection->addAttributeToSelect(['name', 'price', 'image']);
        return $collection;
    }
}
