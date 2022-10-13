<?php

use yii\db\Migration;

class m220714_095504_create_table_agricultural_product_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%agricultural_product_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('is product name translate'),
                'agricultural_product_id' => $this->integer()->notNull()->comment('Agricultural product ID is foreign keys from relation table agricultural product'),
            ],
            $tableOptions
        );

        $this->createIndex('agricultural_products_id', '{{%agricultural_product_translate}}', ['agricultural_product_id']);

        $this->addForeignKey(
            'agricultural_product_translate_ibfk_1',
            '{{%agricultural_product_translate}}',
            ['agricultural_product_id'],
            '{{%agricultural_product}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%agricultural_product_translate}}');
    }
}
