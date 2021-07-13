<?php
namespace AHT\Eav\Api;

interface ProductRepositoryInterface
{
    public function save(\AHT\Eav\Api\Data\ProductInterface $product);

    public function deleteById($id);

    public function getById($id);

    public function delete(\AHT\Eav\Api\Data\ProductInterface $product);
}
