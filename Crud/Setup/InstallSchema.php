<?php
namespace AHT\Crud\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;


class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $connection = $setup->getConnection();
        $tableName = $setup->getTable('another_Table');

        if($connection->isTableExists($tableName) != true )
        {
            $table = $connection
            ->newTable(($tableName))
            ->addColumn(
                'id', 
                Table::TYPE_INTEGER,
                null, 
                ['identity' => true, 'nullable' => false, 'primary' => true]
            )
            ->addColumn(
                'title',
                Table::TYPE_TEXT, 
                255, 
                ['nullable' => false]
            )
            ->addColumn(
                'description',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false]
            )
            ->setOption('charset', 'utf8');
            $connection->createTable($table);
        }

        $setup->endSetup();
    }
}
