<?php
namespace AHT\Crud\Model\ResourceModel\Post;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use AHT\Crud\Model\Post;
use AHT\Crud\Model\ResourceModel\Post as PostResource;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Post::class, PostResource::class);
    }

    
}
