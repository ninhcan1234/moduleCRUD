<?php

namespace AHT\Eav\Model\ResourceModel;

class Product extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    const TABLE_NAME = 'products';
    const TABLE_PRIMARY_KEY = 'product_id';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::TABLE_PRIMARY_KEY);
    }

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }
}
