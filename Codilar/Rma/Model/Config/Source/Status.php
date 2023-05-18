<?php

namespace Codilar\Rma\Model\Config\Source;


class Status implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Backup data
     *
     * @var \Magento\Backup\Helper\Data
     */
    protected $_backupData = null;

    /**
     * @param \Magento\Backup\Helper\Data $backupData
     */
    public function __construct(\Magento\Backup\Helper\Data $backupData)
    {
        $this->_backupData = $backupData;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        
        $backupTypes = array('processing'=>'Processing','complete'=>'Complete');
        return $backupTypes;
    }
}
