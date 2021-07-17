<?php

namespace AHT\Eav\Controller\Action;

use Exception;
class Save extends \Magento\Framework\App\Action\Action
{
    private $_productResource;
    private $_productFactory;

    public function __construct(
        \AHT\Eav\Model\ProductFactory $productFactory,
        \Magento\Framework\App\Action\Context $context,
        \AHT\Eav\Api\ProductRepositoryInterface $productResource
    ) {
        $this->_productResource = $productResource;
        $this->_productFactory = $productFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParam('product_id');
        $date = date('d-m-Y H:i:s');
        $productInterface = $this->_productFactory->create();

        if (empty($id)) {
            try {
                $data['status'] = 0;
                $data['create_at'] = $date;
                $model = $productInterface->setData($data);
                $this->_productResource->save($model);
                $this->messageManager->addSuccessMessage(__("The product has been saved %1", $data['product_name']));
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage(__("errors, your product name must be required!"));
            }
        } else {
            try {
                $productInterface->setId($id);
                $productInterface->setProductName($data['product_name']);
                $productInterface->setDescription($data['description']);
                $productInterface->setUpdate_at($date);
                $this->_productResource->save($productInterface);
                $this->messageManager->addSuccessMessage(__("The product has been update successfully!"));
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage(__("Have some errors, can't edit this product now!!!"));
            }
        }

        $Redirect = $this->resultRedirectFactory->create();
        $Redirect->setPath('new/index');
        return $Redirect;
    }
}
