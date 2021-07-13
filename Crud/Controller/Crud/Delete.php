<?php
namespace AHT\Crud\Controller\Crud;

use AHT\Crud\Model\Post;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResourceConnection;

class Delete extends Action
{
    private $_post;
    private $_postResource;
    private $_postFactory;

    public function __construct(
        Context $context,
        Post $post,
        \AHT\Crud\Model\ResourceModel\Post $postResource,
        \AHT\Crud\Model\PostFactory $postFactory
    )
    {
        $this->_post = $post;
        $this->_postResource =$postResource; 
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $param = $this->getRequest()->getParam('id');
        $id = substr($param, 0, -1);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $myTable = $resource->getTableName('another_table');
        $connection->delete(
            $myTable,
            ['id = ?' => $id]
        );
 
        $Redirect = $this->resultRedirectFactory->create();
        $Redirect-> setPath('crud/index');
        return $Redirect;

    }
}
