<?php

use yii\db\Migration;

class m220107_074926_create_table_currency_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%currency_translate}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'language' => $this->string(45)->notNull(),
                'currency_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%currency_translate}}');
    }
}
