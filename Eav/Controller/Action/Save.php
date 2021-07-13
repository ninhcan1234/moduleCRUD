<?php
namespace AHT\Eav\Controller\Action;

use Exception;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use \AHT\Eav\Api\Data\ProductInterface;
use \AHT\Eav\Api\ProductRepositoryInterface;

class Save extends Action
{
    private $_product;
    private $_productResource;

    public function __construct(
        Context $context,
        ProductInterface $product,
        ProductRepositoryInterface $productResource
    )
    {
        $this->_product = $product;
        $this->_productResource = $productResource;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParam('product_id');
        $date = date('d-m-Y H:i:s');
        // echo "<pre>";
        // print_r($data);
        // var_dump($id);
        // exit;

        if($id == NULL || $id = "")
        {
            try
            {
                $data['status'] = 0;
                $data['create_at'] = $date;
                $model = $this->_product->setData($data);
                $this->_productResource->save($model);
                $this-> messageManager->addSuccessMessage(__("The product has been saved %1", $data['product_name']));
            }
            catch (Exception $e)
            {
                $this-> messageManager->addErrorMessage(__("errors, your product name must be required!"));
            }
        }else
        {   
            try
            {
                $this->_product->setId($id);
                $newData = array(
                    'product_id'=>$id,
                    'product_name'=>$data['product_name'],
                    'description'=>$data['description'],
                    'update_at'=>$date
                );
                $model = $this->_product->setData($newData);
    
                // echo "<pre>";
                // var_dump($data);
                // exit;
                $this->messageManager->addSuccessMessage("The product has been update successfully!");
                $this->_productResource->save($model);
            }
            catch(Exception $e)
            {
                $this->messageManager->addErrorMessage("Have some errors, can't edit this product now!!!");
            }   
        }

        $Redirect = $this->resultRedirectFactory->create();
        $Redirect-> setPath('new/index');
        return $Redirect;
    }
}
