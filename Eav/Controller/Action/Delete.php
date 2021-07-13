<?php
namespace AHT\Eav\Controller\Action;

class Delete extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $_productResource;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \AHT\Eav\Api\ProductRepositoryInterface $productResource
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_productResource = $productResource;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $param = $this->getRequest()->getParam('id');
        $id = substr($param,0,-1);
        $this->_productResource->deleteById($id);

        $reDirect = $this->resultRedirectFactory->create();
        $reDirect->setPath('new/index');
        return $reDirect;
    }
}
