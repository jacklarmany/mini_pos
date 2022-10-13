<?php

use yii\db\Migration;

class m220714_095751_create_table_village_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%village_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of the table'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string(45)->notNull()->comment('Village name in the same language as indicate the field language'),
                'village_id' => $this->integer()->notNull()->comment('Foreign key of the translated village name'),
            ],
            $tableOptions
        );

        $this->createIndex('village_id', '{{%village_translate}}', ['village_id']);

        $this->addForeignKey(
            'village_translate_ibfk_1',
            '{{%village_translate}}',
            ['village_id'],
            '{{%village}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%village_translate}}');
    }
}
