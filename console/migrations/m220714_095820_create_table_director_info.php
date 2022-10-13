<?php

use yii\db\Migration;

class m220714_095820_create_table_director_info extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%director_info}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_company_director_name' => $this->string()->comment('Director name'),
                'project_company_director_phone' => $this->string()->comment('Director phone'),
                'project_company_director_email' => $this->string()->comment('Director email'),
                'date_started' => $this->date()->comment('Director stared date'),
                'project_id' => $this->integer()->comment('Project ID is foreign keys from relation table Project'),
                'representative_office_data_id' => $this->integer()->comment('Use for representative office'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_director_info_project1_idx', '{{%director_info}}', ['project_id']);
        $this->createIndex('fk_director_info_representative_office_data1_idx', '{{%director_info}}', ['representative_office_data_id']);

        $this->addForeignKey(
            'fk_director_info_representative_office_data1',
            '{{%director_info}}',
            ['representative_office_data_id'],
            '{{%representative_office_data}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%director_info}}');
    }
}
