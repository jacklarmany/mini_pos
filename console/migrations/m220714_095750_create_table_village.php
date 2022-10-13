<?php

use yii\db\Migration;

class m220714_095750_create_table_village extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%village}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of the table'),
                'code' => $this->string(45)->comment('Code of the village'),
                'name' => $this->string(45)->notNull()->comment('Name of the village'),
                'province_id' => $this->integer()->notNull()->comment('Province id of the current record'),
                'district_id' => $this->integer()->notNull()->comment('District id of the current record'),
            ],
            $tableOptions
        );

        $this->createIndex('districts_id', '{{%village}}', ['district_id']);
        $this->createIndex('provinces_id', '{{%village}}', ['province_id']);

        $this->addForeignKey(
            'village_ibfk_1',
            '{{%village}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'village_ibfk_2',
            '{{%village}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%village}}');
    }
}
