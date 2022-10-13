<?php

use yii\db\Migration;

class m220714_095824_create_table_electrical_sale extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%electrical_sale}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'price_per_mw' => $this->decimal(12, 2)->notNull()->comment('Price sale/MW'),
                'quantity_mw' => $this->decimal(12, 2)->notNull()->comment('Quantity sale/MW'),
                'amount' => $this->decimal(12, 2)->notNull()->comment('Amount'),
                'percentage' => $this->decimal(12, 2)->comment('Percentage'),
                'electrical_activity_id' => $this->integer()->notNull()->comment('Electrical activity ID is foreign keys from  relation table electrical activity '),
                'country_id' => $this->integer()->notNull()->comment('Country ID is foreign keys from relation table country'),
            ],
            $tableOptions
        );

        $this->createIndex('countries_id', '{{%electrical_sale}}', ['country_id']);
        $this->createIndex('electrical_activities_id', '{{%electrical_sale}}', ['electrical_activity_id']);

        $this->addForeignKey(
            'electrical_sale_ibfk_1',
            '{{%electrical_sale}}',
            ['electrical_activity_id'],
            '{{%electrical_activity}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'electrical_sale_ibfk_2',
            '{{%electrical_sale}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%electrical_sale}}');
    }
}
