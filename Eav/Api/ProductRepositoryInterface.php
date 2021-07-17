<?php
namespace AHT\Eav\Api;

interface ProductRepositoryInterface
{
    public function load(\AHT\Eav\Api\Data\ProductInterface $product, $value, $field = null);

    public function save(\AHT\Eav\Api\Data\ProductInterface $product);

    public function deleteById($id);

    public function getById($id);

    public function delete(\AHT\Eav\Api\Data\ProductInterface $product);
}
