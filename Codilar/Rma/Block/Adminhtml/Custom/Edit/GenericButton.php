<?php

namespace Codilar\Rma\Block\Adminhtml\Custom\Edit;

use Codilar\Rma\Model\RmaFactory;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

class GenericButton
{
    /**
     * @var Context
     */
    protected Context $context;


    /**
     * @param Context         $context
     * @param RmaFactory $modelFactory
     */
    public function __construct(
        Context $context,
        RmaFactory $modelFactory
    ) {
        $this->context = $context;
        $this->modelFactory = $modelFactory;
    }

    /**
     * Return CMS block ID
     *
     * @return int|null
     */
    public function getModelById(): ?int
    {
        try {
            return $this->modelFactory->create()->load(
                $this->context->getRequest()->getParam('entity_id')
            )->getId();
        } catch (NoSuchEntityException $e) {
            $e->errorMessage();
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }

    /**
     * Check where button can be rendered
     *
     * @param string $name
     * @return string
     */
    public function canRender($name)
    {
        return $name;
    }
}
