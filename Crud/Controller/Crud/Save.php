<?php
namespace AHT\Crud\Controller\Crud;

use Exception;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use AHT\Crud\Model\Post;

class Save extends Action
{
    private $_post;
    private $_postResourceModel;

    public function __construct(
        Context $context,
        Post $post,
        \AHT\Crud\Model\ResourceModel\Post $postResourceModel
    )
    {
        $this->_post = $post;
        $this->_postResourceModel = $postResourceModel;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParam('id');
        $date = date('d-m-Y H:i:s');
        $data['create_at'] = $date;
        if(empty($id) || $id == null){
            try
            {
                $model = $this->_post->setData($data);
                $this->_postResourceModel->save($model);
                $this-> messageManager->addSuccessMessage(__("The post has been saved %1", $data['title']));
            }
            catch (Exception $e){
                $this-> messageManager->addErrorMessage(__("Anyone errors"));
            }
        }else{   
            try{
                $model = $this->_post->setData([
                    'id' => $id,
                    'title'=>$data['title'],
                    'description'=>$data['description'],
                    'update_at'=>$date
                ]);
                $this->messageManager->addErrorMessage("The post has been update successfully!");
                $this->_postResourceModel->save($model);
            }
            catch(Exception $e){
                $this->messageManager->addErrorMessage("Have some errors, can't edit this post at the moment!!!");

            }   
        }

        $Redirect = $this->resultRedirectFactory->create();
        $Redirect-> setPath('crud/index');
        return $Redirect;
    }
}
