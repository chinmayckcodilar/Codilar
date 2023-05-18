<?php

namespace Codilar\Rma\Api\Data;

/**
 * Interface ConditionInterface
 * @package Codilar\Rma\Api\Data
 */
interface ConditionInterface
{
    const CONDITION_ID = 'condition_id';
    const CONDITION_NAME = 'title';
    const ADDITIONAL_DATA = 'status';
    /**
     * Get Condition ID.
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Condition ID.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Condition name.
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set Condition name.
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get additional data associated with the Condition.
     *
     * @return string|null
     */
    public function getAdditionalData();

    /**
     * Set additional data associated with the Condition.
     *
     * @param string $additionalData
     * @return $this
     */
    public function setAdditionalData($additionalData);
}
