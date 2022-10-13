<?php

use yii\db\Migration;

class m220714_095812_create_table_representative_office_parent_company extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%representative_office_parent_company}}',
            [
                'representative_office_data_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table representative office data'),
                'parent_company_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table parent company'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%representative_office_parent_company}}', ['representative_office_data_id', 'parent_company_id']);

        $this->createIndex('fk_representative_office_data_has_parent_company_parent_com_idx', '{{%representative_office_parent_company}}', ['parent_company_id']);
        $this->createIndex('fk_representative_office_data_has_parent_company_representa_idx', '{{%representative_office_parent_company}}', ['representative_office_data_id']);

        $this->addForeignKey(
            'fk_representative_office_data_has_parent_company_parent_compa1',
            '{{%representative_office_parent_company}}',
            ['parent_company_id'],
            '{{%parent_company}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_representative_office_data_has_parent_company_representati1',
            '{{%representative_office_parent_company}}',
            ['representative_office_data_id'],
            '{{%representative_office_data}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%representative_office_parent_company}}');
    }
}
