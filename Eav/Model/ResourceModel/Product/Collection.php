<?php
namespace AHT\Eav\Model\ResourceModel\Product;
use \AHT\Eav\Model\Product;
use \AHT\Eav\Model\ResourceModel\Product as ResourceProduct;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'aht_eav_product_collection';
    protected $_eventObject = 'product_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Product::class, ResourceProduct::class);
    }
}
