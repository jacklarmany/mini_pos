<?php

use yii\db\Migration;

class m220107_074727_create_table_parent_company_project extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company_project}}',
            [
                'id' => $this->primaryKey(),
                'parent_company_id' => $this->integer()->notNull(),
                'project_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('parent_companies_id', '{{%parent_company_project}}', ['parent_company_id']);
        $this->createIndex('projects_id', '{{%parent_company_project}}', ['project_id']);

        $this->addForeignKey(
            'parent_company_project_ibfk_1',
            '{{%parent_company_project}}',
            ['parent_company_id'],
            '{{%parent_company}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'parent_company_project_ibfk_2',
            '{{%parent_company_project}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%parent_company_project}}');
    }
}
