<?php

use yii\db\Migration;

class m220714_095639_create_table_user_has_province extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_has_province}}',
            [
                'user_id' => $this->integer()->notNull()->comment('Related user id'),
                'province_id' => $this->integer()->notNull()->comment('Related province id'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%user_has_province}}', ['user_id', 'province_id']);

        $this->createIndex('fk_user_has_province_province1_idx', '{{%user_has_province}}', ['province_id']);
        $this->createIndex('fk_user_has_province_user1_idx', '{{%user_has_province}}', ['user_id']);

        $this->addForeignKey(
            'fk_user_has_province_province1',
            '{{%user_has_province}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_has_province}}');
    }
}
