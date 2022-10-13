<?php

use yii\db\Migration;

class m220107_074643_create_table_language extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%language}}',
            [
                'language_id' => $this->string(5)->notNull()->append('PRIMARY KEY'),
                'language' => $this->string(3)->notNull(),
                'country' => $this->string(3)->notNull(),
                'name' => $this->string(32)->notNull(),
                'name_ascii' => $this->string(32)->notNull(),
                'status' => $this->smallInteger()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%language}}');
    }
}
