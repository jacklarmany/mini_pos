<?php

use yii\db\Migration;

class m220714_095519_create_table_currency_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%currency_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Currency name translate'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'currency_id' => $this->integer()->notNull()->comment('Currency ID is foreign keys from relation table currency'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_currency_translate_currency1_idx', '{{%currency_translate}}', ['currency_id']);

        $this->addForeignKey(
            'fk_currency_translate_currency1',
            '{{%currency_translate}}',
            ['currency_id'],
            '{{%currency}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%currency_translate}}');
    }
}
