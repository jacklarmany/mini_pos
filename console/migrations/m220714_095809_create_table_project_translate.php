<?php

use yii\db\Migration;

class m220714_095809_create_table_project_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'project_name' => $this->string()->notNull()->comment('Project name translate'),
                'project_company_name' => $this->string()->comment('Project company name translate'),
                'project_company_director_name' => $this->string()->comment('Project company director name translate'),
                'representative_name' => $this->string()->comment('Representative name translate'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_translate_project1_idx', '{{%project_translate}}', ['project_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%project_translate}}');
    }
}
