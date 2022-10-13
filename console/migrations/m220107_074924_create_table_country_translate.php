<?php

use yii\db\Migration;

class m220107_074924_create_table_country_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%country_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'country_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('country_id', '{{%country_translate}}', ['country_id']);

        $this->addForeignKey(
            'country_translate_ibfk_1',
            '{{%country_translate}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%country_translate}}');
    }
}
