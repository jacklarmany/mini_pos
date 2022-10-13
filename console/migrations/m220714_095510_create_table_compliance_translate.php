<?php

use yii\db\Migration;

class m220714_095510_create_table_compliance_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%compliance_translate}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'compliance_choice' => $this->string(200)->comment('Compliance name  translate'),
                'compliance_id' => $this->integer()->unsigned()->notNull()->comment('Compliance ID is foreign key from relation table compliance'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_compliance_translate_compliance1_idx', '{{%compliance_translate}}', ['compliance_id']);

        $this->addForeignKey(
            'fk_compliance_translate_compliance1',
            '{{%compliance_translate}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%compliance_translate}}');
    }
}
