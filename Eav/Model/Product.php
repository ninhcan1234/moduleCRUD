<?php
namespace AHT\Eav\Model;

use \Magento\Framework\Model\AbstractModel;

class Product extends AbstractModel implements \AHT\Eav\Api\Data\ProductInterface
{
    protected $_collection;
    
    /*
       Initialize resource model
    */
    protected function _construct()
    {
        $this->_init(ResourceModel\Product::class);
    }

    /*Action for model
    *
    *@param referece interface
    *
    */
    public function getId(){
        return $this->getData(self::PRODUCT_ID);
    }

    public function getProductName()
    {
        return $this->getData(self::PRODUCT_NAME);
    }

    public function setProductName($name)
    {
        return $this->setData(self::PRODUCT_NAME, $name);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getCreate_at()
    {
        return $this->getData(self::TIME_CREATE);
    }

    public function setCreate_at($time)
    {
        return $this->setData(self::TIME_CREATE, $time);
    }

    public function getUpdate_at()
    {
        return $this->getData(self::TIME_UPDATE);
    } 
  
    public function setUpdate_at($time)
    {
        return $this->setData(self::TIME_UPDATE, $time);
    }
}
