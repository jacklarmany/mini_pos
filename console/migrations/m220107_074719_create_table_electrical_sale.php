<?php

use yii\db\Migration;

class m220107_074719_create_table_electrical_sale extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%electrical_sale}}',
            [
                'id' => $this->primaryKey(),
                'price_per_mw' => $this->decimal(12, 2)->notNull(),
                'quantity_mw' => $this->decimal(12, 2)->notNull(),
                'amount' => $this->decimal(12, 2)->notNull(),
                'percentage' => $this->decimal(12, 2)->notNull(),
                'electrical_activity_id' => $this->integer()->notNull(),
                'country_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'electrical_sale_ibfk_2',
            '{{%electrical_sale}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%electrical_sale}}');
    }
}
