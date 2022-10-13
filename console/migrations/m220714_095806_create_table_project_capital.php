<?php

use yii\db\Migration;

class m220714_095806_create_table_project_capital extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_capital}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'capital_value' => $this->decimal(12, 2)->comment('Capital value'),
                'adjustment_times' => $this->integer()->comment('Adjustment Times'),
                'date_adjustment' => $this->date()->comment('Date adjustment'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project'),
                'project_capital_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project capital type'),
                'addedby_user_id' => $this->integer(),
                'editedby_user_id' => $this->integer(),
                'added_date' => $this->dateTime(),
                'edited_date' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_project_capital_project1_idx', '{{%project_capital}}', ['project_id']);
        $this->createIndex('fk_project_capital_project_capital_type1_idx', '{{%project_capital}}', ['project_capital_type_id']);
        $this->createIndex('fk_project_capital_user1_idx', '{{%project_capital}}', ['addedby_user_id']);
        $this->createIndex('fk_project_capital_user2_idx', '{{%project_capital}}', ['editedby_user_id']);

        $this->addForeignKey(
            'fk_project_capital_project_capital_type1',
            '{{%project_capital}}',
            ['project_capital_type_id'],
            '{{%project_capital_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%project_capital}}');
    }
}
