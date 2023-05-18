<?php

namespace Codilar\Rma\Ui\DataProvider;

use Codilar\Rma\Model\ResourceModel\Rma\Collection;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class Dataprovider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected array $_loadedData;

    /**
     * @var StoreManagerInterface
     */
    protected StoreManagerInterface $storeManager;

    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;


    /**
     * Constructor
     *
     * @param string                $name
     * @param string                $primaryFieldName
     * @param string                $requestFieldName
     * @param Collection            $collection
     * @param RequestInterface      $request
     * @param StoreManagerInterface $storeManager
     * @param array                 $meta
     * @param array                 $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collection,
        RequestInterface $request,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collection;
        $this->storeManager = $storeManager;
        $this->request = $request;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     * @throws NoSuchEntityException
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        if (empty($items)) {
            return [];
        }
        $this->_loadedData = [];
        foreach ($items as $model) {
            $this->_loadedData[$model->getId()] = $model->getData();
        }

        return $this->_loadedData;
    }
}
