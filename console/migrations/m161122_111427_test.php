<?php

use yii\db\Migration;

class m161122_111427_test extends Migration
{
    public function up()
    {
    	$tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }

          $this->createTable('{{%test}}', [
              'id' => Schema::TYPE_PK,
              'message' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
              'permissions' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
              'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
              'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
          ], $tableOptions);
    }

    public function down()
    {
        echo "m161122_111427_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
