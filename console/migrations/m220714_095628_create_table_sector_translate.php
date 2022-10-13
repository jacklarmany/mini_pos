<?php

use yii\db\Migration;

class m220714_095628_create_table_sector_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sector_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('Sector name translate'),
                'sector_id' => $this->integer()->comment('Is foreign keys from relation table sector'),
            ],
            $tableOptions
        );

        $this->createIndex('sector_id', '{{%sector_translate}}', ['sector_id']);

        $this->addForeignKey(
            'sector_translate_ibfk_1',
            '{{%sector_translate}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%sector_translate}}');
    }
}
