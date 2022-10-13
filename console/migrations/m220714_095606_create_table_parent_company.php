<?php

use yii\db\Migration;

class m220714_095606_create_table_parent_company extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name'),
                'address' => $this->text(),
                'district' => $this->string(),
                'province' => $this->string(),
                'post_code' => $this->string(45),
                'phone' => $this->string(45),
                'fax' => $this->string(45),
                'email' => $this->string(45),
                'registration_number' => $this->string()->notNull()->comment('Registration number'),
                'registered_date' => $this->date()->notNull()->comment('registered date'),
                'country_id' => $this->integer()->notNull()->comment('Is foreign keys from relation  table country '),
                'origin_country_id' => $this->integer()->comment('Is foreign keys from relation  table country'),
                'registered_country_id' => $this->integer()->comment('Is foreign keys from relation  table country '),
                'attach_file' => $this->string()->comment('Attach relation document'),
            ],
            $tableOptions
        );

        $this->createIndex('countries_id', '{{%parent_company}}', ['country_id']);
        $this->createIndex('origin_countries_id', '{{%parent_company}}', ['origin_country_id']);
        $this->createIndex('registered_countries_id', '{{%parent_company}}', ['registered_country_id']);

        $this->addForeignKey(
            'parent_company_ibfk_1',
            '{{%parent_company}}',
            ['registered_country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'parent_company_ibfk_2',
            '{{%parent_company}}',
            ['origin_country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'parent_company_ibfk_3',
            '{{%parent_company}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%parent_company}}');
    }
}
