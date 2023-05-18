<?php

namespace Codilar\Rma\Api\Data;

/**
 * Interface StatusInterface
 * @package Codilar\Rma\Api\Data
 */
interface StatusInterface
{
    /**
     * Constants for keys of data array.
     */
    const STATUS_ID = 'status_id';
    const TITLE = 'title';
    const CREATEDAT = 'created_at';
    const UPDATEDAT = 'updated_at';

    /**
     * Get Status ID.
     *
     * @return int|null
     */
    public function getStatusId();

    /**
     * Set Status ID.
     *
     * @param int $statusId
     * @return $this
     */
    public function setStatusId($statusId);

    /**
     * Get Status Title.
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set Status Title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get Created At.
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set Created At.
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Updated At.
     *
     * @return string|null
     */
    public function getUpdatedAt();

     /**
     * Set Updated At.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}
