<?php

namespace Codilar\Rma\Model;

use Codilar\Rma\Api\Data\ConditionInterface;

class Condition extends \Magento\Framework\Model\AbstractModel implements ConditionInterface
{
    const CACHE_TAG = 'codilar_rma_condition';

    protected $_cacheTag = 'codilar_rma_condition';

    protected $_eventPrefix = 'codilar_rma_condition';

    protected function _construct()
    {
        $this->_init('Codilar\Rma\Model\ResourceModel\Condition');
    }

    /**
     * Get Condition ID.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::CONDITION_ID);
    }

    /**
     * Set Condition ID.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::CONDITION_ID, $id);
    }

    /**
     * Get Condition name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::CONDITION_NAME);
    }

    /**
     * Set Condition name.
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::CONDITION_NAME, $name);
    }

    /**
     * Get additional data associated with the Condition.
     *
     * @return string|null
     */
    public function getAdditionalData()
    {
        return $this->getData(self::ADDITIONAL_DATA);
    }

    /**
     * Set additional data associated with the Condition.
     *
     * @param string $additionalData
     * @return $this
     */
    public function setAdditionalData($additionalData)
    {
        return $this->setData(self::ADDITIONAL_DATA, $additionalData);
    }
}
