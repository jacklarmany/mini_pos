<?php

use yii\db\Migration;

class m220714_095821_create_table_director_info_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%director_info_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_company_director_name' => $this->string()->comment('Director name translate'),
                'language' => $this->string(45)->comment('Language code'),
                'director_info_id' => $this->integer()->notNull()->comment('Director info ID is foreign keys from relation table director'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_director_info_translate_director_info1_idx', '{{%director_info_translate}}', ['director_info_id']);

        $this->addForeignKey(
            'fk_director_info_translate_director_info1',
            '{{%director_info_translate}}',
            ['director_info_id'],
            '{{%director_info}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%director_info_translate}}');
    }
}
