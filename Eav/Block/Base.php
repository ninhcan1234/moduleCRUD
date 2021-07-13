<?php
namespace AHT\Eav\Block;

class Base extends \Magento\Framework\View\Element\Template
{
    
    protected $collection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \AHT\Eav\Model\ResourceModel\Product\Collection $collection
    ) {
        $this->collection = $collection;
        parent::__construct($context, $data);
    }

    public function getTittle(){
        return __('CRUD DATABASE');
    }

    public function getEditBase($id){
        return $this->getUrl('new/action/edit?id='.$id);
    }

    public function getSaveBase(){
        return $this->getUrl('new/action/save');
    }

    public function getDeleteBase($id){
        return $this->getUrl('new/action/delete?id='.$id);
    }

    public function getAll(){
        $data = $this->collection;
        return $data;
    }


}
