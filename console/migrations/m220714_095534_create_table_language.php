<?php

use yii\db\Migration;

class m220714_095534_create_table_language extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%language}}',
            [
                'language_id' => $this->string(5)->notNull()->append('PRIMARY KEY')->comment('Primary language ID'),
                'language' => $this->string(3)->notNull()->comment('Language code'),
                'country' => $this->string(3)->notNull()->comment('Country code'),
                'name' => $this->string(32)->notNull()->comment('Country name'),
                'name_ascii' => $this->string(32)->notNull()->comment('Country name for ascii'),
                'status' => $this->smallInteger()->notNull()->comment('Status'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
