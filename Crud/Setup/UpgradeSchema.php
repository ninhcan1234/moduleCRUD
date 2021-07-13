<?php
namespace AHT\Crud\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $connection = $setup->getConnection();
        $tableName = $setup->getTable('another_table'); 

        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            if($connection->isTableExists($tableName) != true )
            {
                $table = $connection
                ->newTable(($tableName))
                ->addColumn(
                    'id', 
                    Table::TYPE_INTEGER,
                    null, 
                    ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true]
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
                ->addColumn(
                    'create_at',
                    Table::TYPE_TIMESTAMP,
                    ['nullable' => false]
                )
                ->addColumn(
                    'update_at',
                    Table::TYPE_TIMESTAMP,
                    ['nullable' => false]
                )
                ->setOption('charset', 'utf8');
                $connection->createTable($table);
            }
        }

        $setup->endSetup();
    }
}
