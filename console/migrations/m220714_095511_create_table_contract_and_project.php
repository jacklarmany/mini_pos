<?php

use yii\db\Migration;

class m220714_095511_create_table_contract_and_project extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_and_project}}',
            [
                'main_contract_id' => $this->integer()->defaultValue('0')->comment('Primary key of table is auto increment'),
                'number_code' => $this->string()->comment('Number code is number of contract'),
                'project_id' => $this->integer()->comment('Project ID is foreign keys from relation  table project'),
                'extended_contract_id' => $this->integer()->comment('Extended contract ID is foreign key from previous contract'),
                'contract_type_id' => $this->integer()->comment('Contract type ID is foreign keys from relation contract type'),
                'start_at' => $this->date()->comment('Contract date start'),
                'end_at' => $this->date()->comment('Contract date end'),
                'attach_file' => $this->string()->comment('Attach document relation contract'),
                'extent_times' => $this->integer()->comment('Times extent contract'),
                'date_issue' => $this->date()->comment('Contract date issue'),
                'id' => $this->integer()->notNull()->defaultValue('0')->comment('Primary key of table is auto increment'),
                'project_code' => $this->string()->notNull()->comment('Project code'),
                'project_name' => $this->string()->notNull()->comment('project name'),
                'project_company_name' => $this->string()->comment('project company name'),
                'project_company_provinces_id' => $this->integer()->comment('Is foreign keys from relation table province '),
                'project_company_districts_id' => $this->integer()->comment('Is foreign keys from relation table district'),
                'project_company_village_id' => $this->integer(),
                'project_company_phone' => $this->string(45),
                'project_company_fax' => $this->string(45),
                'project_company_email' => $this->string(),
                'project_company_registration_number' => $this->string(),
                'project_company_tax_id_number' => $this->string(),
                'currency_rate' => $this->decimal(12, 2)->notNull(),
                'license_approval' => $this->string()->notNull(),
                'investment_type_id' => $this->integer(),
                'sector_id' => $this->integer()->notNull(),
                'representative_name' => $this->string(),
                'representative_phone' => $this->string(45),
                'representative_fax' => $this->string(45),
                'representative_email' => $this->text(),
                'representative_province_id' => $this->integer(),
                'representative_district_id' => $this->integer(),
                'representative_village_id' => $this->integer(),
                'ppp_model_id' => $this->integer()->comment('Use only for sector ppp'),
                'approval_by_province_id' => $this->integer(),
                'activity_invenstment_license' => $this->text(),
                'project_remove' => $this->string()->defaultValue('No'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contract_and_project}}');
    }
}
