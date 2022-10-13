<?php

use yii\db\Migration;

class m220107_074708_create_table_project extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project}}',
            [
                'id' => $this->primaryKey(),
                'project_code' => $this->string()->notNull(),
                'project_name' => $this->string()->notNull(),
                'project_company_name' => $this->string()->notNull(),
                'project_company_provinces_id' => $this->integer()->notNull(),
                'project_company_districts_id' => $this->integer()->notNull(),
                'project_company_village_id' => $this->integer()->notNull(),
                'project_company_phone' => $this->string(45)->notNull(),
                'project_company_fax' => $this->string(45),
                'project_company_email' => $this->string(),
                'project_company_director_name' => $this->string()->notNull(),
                'project_company_director_phone' => $this->string(45)->notNull(),
                'project_company_director_email' => $this->string()->notNull(),
                'project_company_registration_number' => $this->string()->notNull(),
                'project_company_tax_id_number' => $this->string()->notNull(),
                'total_value' => $this->decimal(12, 2)->notNull(),
                'total_value_adjustment' => $this->decimal(12, 2)->notNull(),
                'total_capital' => $this->decimal(12, 2)->notNull(),
                'total_capital_adjustment' => $this->decimal(12, 2)->notNull(),
                'registered_capital_cash' => $this->decimal(12, 2)->notNull(),
                'registered_capital_cash_adjustment' => $this->decimal(12, 2)->notNull(),
                'registered_capital_equipment' => $this->decimal(12, 2)->notNull(),
                'registered_capital_equipment_adjustment' => $this->decimal(12, 2)->notNull(),
                'currency_rate' => $this->decimal(12, 2)->notNull(),
                'license_approval' => $this->string()->notNull(),
                'investment_type_id' => $this->integer()->notNull(),
                'sector_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_district1_idx', '{{%project}}', ['project_company_districts_id']);
        $this->createIndex('fk_project_province1_idx', '{{%project}}', ['project_company_provinces_id']);
        $this->createIndex('fk_project_sector1_idx', '{{%project}}', ['sector_id']);
        $this->createIndex('fk_project_village1_idx', '{{%project}}', ['project_company_village_id']);
        $this->createIndex('investment_type_id', '{{%project}}', ['investment_type_id']);
        $this->createIndex('project_code_UNIQUE', '{{%project}}', ['project_code'], true);

        $this->addForeignKey(
            'fk_project_district1',
            '{{%project}}',
            ['project_company_districts_id'],
            '{{%district}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_project_province1',
            '{{%project}}',
            ['project_company_provinces_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_project_sector1',
            '{{%project}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_project_village1',
            '{{%project}}',
            ['project_company_village_id'],
            '{{%village}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'project_ibfk_1',
            '{{%project}}',
            ['investment_type_id'],
            '{{%investment_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%project}}');
    }
}
