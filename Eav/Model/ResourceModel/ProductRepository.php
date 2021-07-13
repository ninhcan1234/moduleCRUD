<?php
namespace AHT\Eav\Model\ResourceModel;

use \AHT\Eav\Api\ProductRepositoryInterface;
use \AHT\Eav\Api\Data\ProductInterface;
use \Magento\Framework\Exception\NoSuchEntityException;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;
    protected $productResource;
    protected $productFactory;

    public function __construct(
        \AHT\Eav\Model\ResourceModel\Product $productResource,
        \AHT\Eav\Model\ProductFactory $productFactory
    )
    {
        $this->productResource = $productResource;
        $this->productFactory = $productFactory;
    }

    public function save(ProductInterface $product){
        $this->productResource->save($product);
        return $product;
    }

    public function delete(ProductInterface $product){
        $this->productResource->delete($product);
        return true;
    }

    public function getById($id)
    {
        $product = $this->productFactory->create();
        $product->load($id);
        if (!$product->getId()) {
            throw new NoSuchEntityException(__('The Product with the "%1" ID doesn\'t exist.', $id));
        }
        return $product;
    }

    public function deleteById($id){
        $this->productResource->delete($this->getById($id));
    }

    
}
