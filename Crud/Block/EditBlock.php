<?php
namespace AHT\Crud\Block;
use \Magento\Framework\View\Element\Template;

class EditBlock extends Template
{
    protected $collection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getTitle(){
        return __('Edit Post');
    }

    public function getInform(){
        $param = $this->getRequest()->getParam('id');
        $id = substr($param,0,-1);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $objectFactory = $objectManager->get('\AHT\Crud\Model\PostFactory')->create();
        $object = $objectFactory->load($id)->getData();
        return $object;
    }

    public function getSaveBase(){
        return $this-> getUrl('crud/crud/save');
    }

}
