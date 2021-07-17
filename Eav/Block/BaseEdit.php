<?php

namespace AHT\Eav\Block;

class BaseEdit extends \Magento\Framework\View\Element\Template
{
    protected $_productFactory;
    protected $_productResource;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Eav\Api\ProductRepositoryInterface $productResource,
        \AHT\Eav\Model\ProductFactory $productFactory,
        array $data = []
    ) {
        $this->_productResource = $productResource;
        $this->_productFactory = $productFactory;
        parent::__construct($context, $data);
    }

    public function getTitle()
    {
        return __('Edit Product');
    }

    public function getRecordById()
    {
        $param = $this->getRequest()->getParam('id');
        $id = substr($param, 0, -1);
        $objectRecord = $this->_productFactory->create();
        $data = $this->_productResource->load($objectRecord, $id);
        return $data;
    }

    public function getSaveBase()
    {
        return $this->getUrl('new/action/save');
    }
}
