<?php

use yii\db\Migration;

class m220714_095527_create_table_fund_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%fund_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('Fund name translate'),
                'fund_id' => $this->integer()->comment('Fund ID is foreign keys from relation table fund'),
            ],
            $tableOptions
        );

        $this->createIndex('fund_id', '{{%fund_translate}}', ['fund_id']);

        $this->addForeignKey(
            'fund_translate_ibfk_1',
            '{{%fund_translate}}',
            ['fund_id'],
            '{{%fund}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%fund_translate}}');
    }
}
