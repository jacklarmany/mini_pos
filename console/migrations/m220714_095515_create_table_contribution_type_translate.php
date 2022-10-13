<?php

use yii\db\Migration;

class m220714_095515_create_table_contribution_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contribution_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('Contribution type name translate'),
                'contribution_type_id' => $this->integer()->notNull()->comment('Contribution type ID is foreign keys from relation table contribution type'),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'contribution_type_translate_ibfk_1',
            '{{%contribution_type_translate}}',
            ['contribution_type_id'],
            '{{%contribution_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contribution_type_translate}}');
    }
}
