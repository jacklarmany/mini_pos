<?php

use yii\db\Migration;

class m220107_074710_create_table_project_location_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_location_translate}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'river' => $this->string()->comment('this field Use on for projecet Hydro'),
                'language' => $this->string(45)->notNull(),
                'project_location_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%project_location_translate}}');
    }
}
