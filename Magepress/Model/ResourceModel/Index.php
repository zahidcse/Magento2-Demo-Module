<?php
/**
 * Copyright © 2015 Itheaven. All rights reserved.
 */
namespace Itheaven\Magepress\Model\ResourceModel;

/**
 * Index resource
 */
class Index extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('magepress_index', 'id');
    }

  
}
