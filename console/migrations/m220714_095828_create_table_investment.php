<?php

use yii\db\Migration;

class m220714_095828_create_table_investment extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'share_percentage' => $this->string(45)->notNull()->comment('Percentage share'),
                'share_value' => $this->string(45)->notNull()->comment('Amount share'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation table project'),
                'goverment_agency_id' => $this->integer()->comment('Government agency ID is foreign keys from relation table government agency'),
                'company_id' => $this->integer()->comment('Company ID is foreign keys from relation table company'),
                'representative' => $this->string()->comment('Representative name'),
            ],
            $tableOptions
        );

        $this->createIndex('companies_id', '{{%investment}}', ['company_id']);
        $this->createIndex('goverment_agencies_id', '{{%investment}}', ['goverment_agency_id']);
        $this->createIndex('projects_id', '{{%investment}}', ['project_id']);

        $this->addForeignKey(
            'investment_ibfk_2',
            '{{%investment}}',
            ['company_id'],
            '{{%company}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'investment_ibfk_3',
            '{{%investment}}',
            ['goverment_agency_id'],
            '{{%goverment_agency}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%investment}}');
    }
}
