<?php

use yii\db\Migration;

class m220714_095808_create_table_project_location_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_location_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'river' => $this->string()->comment('This field Use on for projecet Hydro'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'project_location_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project location'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_location_translate_project_location1_idx', '{{%project_location_translate}}', ['project_location_id']);

        $this->addForeignKey(
            'fk_project_location_translate_project_location1',
            '{{%project_location_translate}}',
            ['project_location_id'],
            '{{%project_location}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%project_location_translate}}');
    }
}
