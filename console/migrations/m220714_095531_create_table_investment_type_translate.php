<?php

use yii\db\Migration;

class m220714_095531_create_table_investment_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Investment type name translate'),
                'investment_type_id' => $this->integer()->notNull()->comment('Investment type ID is foreign keys from  relation table investment type'),
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
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%investment_type_translate}}');
    }
}
