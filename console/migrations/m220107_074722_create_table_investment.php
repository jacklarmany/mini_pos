<?php

use yii\db\Migration;

class m220107_074722_create_table_investment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment}}',
            [
                'id' => $this->primaryKey(),
                'share_percentage' => $this->string(45)->notNull(),
                'share_value' => $this->string(45)->notNull(),
                'project_id' => $this->integer()->notNull(),
                'goverment_agency_id' => $this->integer(),
                'company_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('companies_id', '{{%investment}}', ['company_id']);
        $this->createIndex('goverment_agencies_id', '{{%investment}}', ['goverment_agency_id']);
        $this->createIndex('projects_id', '{{%investment}}', ['project_id']);

        $this->addForeignKey(
            'investment_ibfk_1',
            '{{%investment}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'investment_ibfk_2',
            '{{%investment}}',
            ['company_id'],
            '{{%company}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'investment_ibfk_3',
            '{{%investment}}',
            ['goverment_agency_id'],
            '{{%goverment_agency}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%investment}}');
    }
}
