<?php

use yii\db\Migration;

class m220714_095836_create_table_registered_capital extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%registered_capital}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'value' => $this->decimal(12, 2)->notNull()->comment('Value ($)'),
                'representative_office_data_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table Represenative office data'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_registered_capital_representative_office_data1_idx', '{{%registered_capital}}', ['representative_office_data_id']);

        $this->addForeignKey(
            'fk_registered_capital_representative_office_data1',
            '{{%registered_capital}}',
            ['representative_office_data_id'],
            '{{%representative_office_data}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%registered_capital}}');
    }
}
