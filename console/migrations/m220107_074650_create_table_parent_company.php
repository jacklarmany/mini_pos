<?php

use yii\db\Migration;

class m220107_074650_create_table_parent_company extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%parent_company}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'address' => $this->text()->notNull(),
                'district' => $this->string()->notNull(),
                'province' => $this->string()->notNull(),
                'post_code' => $this->string(45)->notNull(),
                'phone' => $this->string(45)->notNull(),
                'fax' => $this->string(45),
                'email' => $this->string(45),
                'registration_number' => $this->string()->notNull(),
                'registered_date' => $this->date()->notNull(),
                'country_id' => $this->integer()->notNull(),
                'origin_country_id' => $this->integer()->notNull(),
                'registered_country_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'parent_company_ibfk_2',
            '{{%parent_company}}',
            ['origin_country_id'],
            '{{%country}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'parent_company_ibfk_3',
            '{{%parent_company}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%parent_company}}');
    }
}
