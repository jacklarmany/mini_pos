<?php

use yii\db\Migration;

class m220714_095647_create_table_control_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%control_list}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Control list name'),
                'sector_id' => $this->integer()->notNull()->comment('Sector ID is foreign keys from relation table sector'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_control_list_sector1_idx', '{{%control_list}}', ['sector_id']);

        $this->addForeignKey(
            'fk_control_list_sector1',
            '{{%control_list}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%control_list}}');
    }
}
