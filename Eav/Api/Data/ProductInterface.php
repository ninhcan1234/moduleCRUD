<?php
namespace AHT\Eav\Api\Data;

interface ProductInterface 
{

    const PRODUCT_ID = 'product_id';
    const PRODUCT_NAME = 'product_name';
    const DESCRIPTION = 'description';
    const TIME_CREATE = 'create_at';
    const TIME_UPDATE = 'update_at';

    public function getId();

    public function setId($id);

    // public function getList();

    public function setData($key, $value = null);

    public function getProductName();

    public function setProductName($name);
    
    public function getDescription();

    public function setDescription($description);

    public function getCreate_at();

    public function setCreate_at($time);

    public function getUpdate_at();

    public function setUpdate_at($time);
    
}
