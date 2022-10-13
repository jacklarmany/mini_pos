<?php

use yii\db\Migration;

class m220107_074636_create_table_fund_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%fund_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'fund_id' => $this->integer(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%fund_translate}}');
    }
}
