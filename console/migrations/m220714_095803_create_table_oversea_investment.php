<?php

use yii\db\Migration;

class m220714_095803_create_table_oversea_investment extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%oversea_investment}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'company_name' => $this->string()->notNull()->comment('Company name'),
                'enterprise_license' => $this->string()->comment('Enterprise lincens'),
                'tax_id' => $this->string()->comment('Tax ID'),
                'province_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table province'),
                'district_id' => $this->integer()->comment('Is foreign keys from relation table district'),
                'village_id' => $this->integer()->comment('Is foreign keys from relation table village'),
                'phone' => $this->string()->comment('Phone'),
                'fax' => $this->string()->comment('Fax'),
                'email' => $this->string()->comment('Email'),
                'addre_company_aboard' => $this->text()->comment('Address company aboard'),
                'addre_company_aboard_phone' => $this->string()->comment('Address company aboard phone'),
                'addre_company_aboard_fax' => $this->string()->comment('Address company aboard fax'),
                'addre_company_aboard_email' => $this->string()->comment('Address company aboard email'),
                'purpose' => $this->text()->notNull()->comment('Purpose'),
                'period_year' => $this->string(45)->notNull()->comment('Period year'),
                'destination_country' => $this->integer()->notNull()->comment('destination country'),
                'remove' => $this->string(3),
            ],
            $tableOptions
        );

        $this->createIndex('fk_oversea_investment_district1_idx', '{{%oversea_investment}}', ['district_id']);
        $this->createIndex('fk_oversea_investment_province1_idx', '{{%oversea_investment}}', ['province_id']);
        $this->createIndex('fk_oversea_investment_village1_idx', '{{%oversea_investment}}', ['village_id']);

        $this->addForeignKey(
            'fk_oversea_investment_district1',
            '{{%oversea_investment}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_oversea_investment_province1',
            '{{%oversea_investment}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_oversea_investment_village1',
            '{{%oversea_investment}}',
            ['village_id'],
            '{{%village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%oversea_investment}}');
    }
}
