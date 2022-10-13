<?php

use yii\db\Migration;

class m220107_074954_create_table_sector_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sector_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'sector_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('sector_id', '{{%sector_translate}}', ['sector_id']);

        $this->addForeignKey(
            'sector_translate_ibfk_1',
            '{{%sector_translate}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%sector_translate}}');
    }
}
