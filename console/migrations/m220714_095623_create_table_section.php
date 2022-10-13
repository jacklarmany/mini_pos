<?php

use yii\db\Migration;

class m220714_095623_create_table_section extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%section}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'section_name' => $this->string()->comment('Section name'),
                'sort' => $this->tinyInteger()->comment('Sort'),
                'sector_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table sector'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%section}}');
    }
}
