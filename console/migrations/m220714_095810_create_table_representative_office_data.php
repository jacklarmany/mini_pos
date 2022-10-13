<?php

use yii\db\Migration;

class m220714_095810_create_table_representative_office_data extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%representative_office_data}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'representative_office_name' => $this->string()->notNull()->comment('Representative office name'),
                'address_province_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table province'),
                'address_district_id' => $this->integer()->comment('Is foreign keys from relation table district'),
                'address_village_id' => $this->integer()->comment('Is foreign keys from relation table village'),
                'phone' => $this->string()->comment('Phone number'),
                'fax' => $this->string()->comment('Fax number'),
                'email' => $this->string()->comment('Email'),
                'purpose' => $this->text()->notNull()->comment('Purpose'),
                'remove' => $this->string(3),
            ],
            $tableOptions
        );

        $this->createIndex('fk_representative_office_data_district1_idx', '{{%representative_office_data}}', ['address_district_id']);
        $this->createIndex('fk_representative_office_data_province1_idx', '{{%representative_office_data}}', ['address_province_id']);
        $this->createIndex('fk_representative_office_data_village1_idx', '{{%representative_office_data}}', ['address_village_id']);

        $this->addForeignKey(
            'fk_representative_office_data_district1',
            '{{%representative_office_data}}',
            ['address_district_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_representative_office_data_province1',
            '{{%representative_office_data}}',
            ['address_province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_representative_office_data_village1',
            '{{%representative_office_data}}',
            ['address_village_id'],
            '{{%village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%representative_office_data}}');
    }
}
