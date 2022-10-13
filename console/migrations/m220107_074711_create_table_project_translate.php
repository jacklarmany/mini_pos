<?php

use yii\db\Migration;

class m220107_074711_create_table_project_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45),
                'project_name' => $this->string()->notNull(),
                'project_company_name' => $this->string(),
                'project_company_director_name' => $this->string(),
                'project_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_translate_project1_idx', '{{%project_translate}}', ['project_id']);

        $this->addForeignKey(
            'fk_project_translate_project1',
            '{{%project_translate}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%project_translate}}');
    }
}
