<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170525_124047_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
     public function up()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
 
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'firstname_rus' => $this->string()->notNull(),
            'lastname_rus' => $this->string()->notNull(),
            'firstname_eng' => $this->string()->notNull(),
            'lastname_eng' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'company' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }
 
    public function down()
    {
        $this->dropTable('user');
    }
}
