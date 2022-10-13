<?php

use yii\db\Migration;

class m220714_095617_create_table_province_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%province_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->comment('Province name translate'),
                'province_id' => $this->integer()->comment('Is foreign keys from relation table province'),
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
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%province_translate}}');
    }
}
