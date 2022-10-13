<?php

use yii\db\Migration;

class m220107_074655_create_table_province_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%province_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string(),
                'province_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('provinces_id', '{{%province_translate}}', ['province_id']);

        $this->addForeignKey(
            'province_translate_ibfk_1',
            '{{%province_translate}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%province_translate}}');
    }
}
