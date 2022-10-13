<?php

use yii\db\Migration;

class m220714_095650_create_table_district_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%district_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'name' => $this->string()->notNull()->comment('District name translate'),
                'district_id' => $this->integer()->notNull()->comment('District ID is foreign keys from relation table district'),
            ],
            $tableOptions
        );

        $this->createIndex('districts_id', '{{%district_translate}}', ['district_id']);

        $this->addForeignKey(
            'district_translate_ibfk_1',
            '{{%district_translate}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%district_translate}}');
    }
}
