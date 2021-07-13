<?php
namespace AHT\Crud\Model;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
    }
}
