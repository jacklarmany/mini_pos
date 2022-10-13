<?php

use yii\db\Migration;

class m220107_074920_create_table_contribution_type_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contribution_type_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'contribution_type_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'contribution_type_translate_ibfk_1',
            '{{%contribution_type_translate}}',
            ['contribution_type_id'],
            '{{%contribution_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%contribution_type_translate}}');
    }
}
