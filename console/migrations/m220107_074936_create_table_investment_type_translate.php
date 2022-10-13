<?php

use yii\db\Migration;

class m220107_074936_create_table_investment_type_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment_type_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string()->notNull(),
                'investment_type_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('investment_types_id', '{{%investment_type_translate}}', ['investment_type_id']);

        $this->addForeignKey(
            'investment_type_translate_ibfk_1',
            '{{%investment_type_translate}}',
            ['investment_type_id'],
            '{{%investment_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%investment_type_translate}}');
    }
}
