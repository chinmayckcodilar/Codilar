<?php

namespace Codilar\Rma\Model;

class Status extends \Magento\Framework\Model\AbstractModel implements \Codilar\Rma\Api\Data\StatusInterface
{


	protected function _construct()
	{
		$this->_init(\Codilar\Rma\Model\ResourceModel\Status::class);
	}
	/**
     * Get Status ID.
     *
     * @return int|null
     */
    public function getStatusId()
	{
		return $this->getData(self::STATUS_ID);
	}

    /**
     * Set Status ID.
     *
     * @param int $statusId
     * @return $this
     */
    public function setStatusId($statusId)
	{
		return $this->setData(self::STATUS_ID, $statusId);

	}

    /**
     * Get Status Title.
     *
     * @return string|null
     */
    public function getTitle()
	{
		return $this->getData(self::TITLE);

	}

    /**
     * Set Status Title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
	{
		return $this->setData(self::TITLE, $title);

	}

    /**
     * Get Created At.
     *
     * @return string|null
     */
    public function getCreatedAt()
	{
		return $this->getData(self::CREATED_AT);
	}

    /**
     * Set Created At.
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
	{
		return $this->setData(self::CREATED_AT, $createdAt);

	}

    /**
     * Get Updated At.
     *
     * @return string|null
     */
    public function getUpdatedAt()
	{
		return $this->getData(self::UPDATED_AT);

	}

     /**
     * Set Updated At.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
	{
		return $this->setData(self::UPDATED_AT, $updatedAt);

	}
}