<?php
namespace AHT\Crud\Block;

use AHT\Crud\Model\ResourceModel\Post\Collection;
use \Magento\Framework\View\Element\Template;

class Base extends Template
{
    
    protected $collection;

    public function __construct(TemPlate\Context $context, array $data =[], Collection $collection)
    {
        $this->collection = $collection;
        return parent::__construct($context,$data);
    }

    public function getTitle(){
        return __('CRUD DATABASE');
    }

    public function getAllPost(){
        $data=  $this -> collection;
        return $data;

    }
  
    public function getSaveBase(){
        return $this-> getUrl('crud/crud/save');
    }

    public function getEditBase($id){
        return $this->getUrl('crud/crud/edit?id='.$id);
    }

    public function getDeleteBase($id){
        return $this->getUrl('crud/crud/delete?id='.$id);
    }

}
