<?php

use yii\db\Migration;

class m220714_095805_create_table_project extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
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
                'createdby_user_id' => $this->integer(),
                'created_date' => $this->dateTime(),
                'updated_date' => $this->dateTime(),
                'updatedby_user_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_district1_idx', '{{%project}}', ['project_company_districts_id']);
        $this->createIndex('fk_project_district2_idx', '{{%project}}', ['representative_district_id']);
        $this->createIndex('fk_project_ppp_model1_idx', '{{%project}}', ['ppp_model_id']);
        $this->createIndex('fk_project_province1_idx', '{{%project}}', ['project_company_provinces_id']);
        $this->createIndex('fk_project_province2_idx', '{{%project}}', ['representative_province_id']);
        $this->createIndex('fk_project_province3_idx', '{{%project}}', ['approval_by_province_id']);
        $this->createIndex('fk_project_sector1_idx', '{{%project}}', ['sector_id']);
        $this->createIndex('fk_project_user1_idx', '{{%project}}', ['createdby_user_id']);
        $this->createIndex('fk_project_user2_idx', '{{%project}}', ['updatedby_user_id']);
        $this->createIndex('fk_project_village1_idx', '{{%project}}', ['project_company_village_id']);
        $this->createIndex('fk_project_village2_idx', '{{%project}}', ['representative_village_id']);
        $this->createIndex('investment_type_id', '{{%project}}', ['investment_type_id']);
        $this->createIndex('project_code_UNIQUE', '{{%project}}', ['project_code'], true);

        $this->addForeignKey(
            'fk_project_district1',
            '{{%project}}',
            ['project_company_districts_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_district2',
            '{{%project}}',
            ['representative_district_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_ppp_model1',
            '{{%project}}',
            ['ppp_model_id'],
            '{{%ppp_model}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_province1',
            '{{%project}}',
            ['project_company_provinces_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_province2',
            '{{%project}}',
            ['representative_province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_province3',
            '{{%project}}',
            ['approval_by_province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_sector1',
            '{{%project}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_village1',
            '{{%project}}',
            ['project_company_village_id'],
            '{{%village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_village2',
            '{{%project}}',
            ['representative_village_id'],
            '{{%village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'project_ibfk_1',
            '{{%project}}',
            ['investment_type_id'],
            '{{%investment_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%project}}');
    }
}
