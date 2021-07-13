<?php
namespace AHT\Eav\Block;

class BaseEdit extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getTitle(){
        return __('Edit Product');
    }

    public function getInform(){
        $param = $this->getRequest()->getParam('id');
        $id = substr($param,0,-1);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $objectFactory = $objectManager->get('\AHT\Eav\Model\ProductFactory')->create();
        $data = $objectFactory->load($id)->getData();
        return $data;
    }

    public function getSaveBase(){
        return $this->getUrl('new/action/save');
    }

}
