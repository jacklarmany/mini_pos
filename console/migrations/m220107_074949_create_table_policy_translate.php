<?php

use yii\db\Migration;

class m220107_074949_create_table_policy_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%policy_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'policy_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('policy_id', '{{%policy_translate}}', ['policy_id']);

        $this->addForeignKey(
            'policy_translate_ibfk_1',
            '{{%policy_translate}}',
            ['policy_id'],
            '{{%policy}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%policy_translate}}');
    }
}
