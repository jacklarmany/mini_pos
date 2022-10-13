<?php

use yii\db\Migration;

class m220714_095834_create_table_parent_company_project extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company_project}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'parent_company_id' => $this->integer()->notNull()->comment('Is foreign keys from relation parent company'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation project'),
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
    }

    public function safeDown()
    {
        $this->dropTable('{{%parent_company_project}}');
    }
}
