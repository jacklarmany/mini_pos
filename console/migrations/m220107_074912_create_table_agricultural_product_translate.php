<?php

use yii\db\Migration;

class m220107_074912_create_table_agricultural_product_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%agricultural_product_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string()->notNull(),
                'agricultural_product_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%agricultural_product_translate}}');
    }
}
