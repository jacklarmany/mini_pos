<?php

use yii\db\Migration;

class m220714_095622_create_table_river_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%river_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->comment('Name river translate'),
                'language' => $this->string(45)->comment('Language code'),
                'river_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table river'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_river_translate_river1_idx', '{{%river_translate}}', ['river_id']);

        $this->addForeignKey(
            'fk_river_translate_river1',
            '{{%river_translate}}',
            ['river_id'],
            '{{%river}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%river_translate}}');
    }
}
