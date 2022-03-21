<?php

use yii\db\Migration;

/**
 * Class m220321_132123_album
 */
class m220321_132123_album extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
        ]);

        $this->createIndex(
            'index_user_id',
            'album',
            'user_id'
        );

        $this->addForeignKey(
            'fk_user_id',
            'album',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220321_132123_album cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220321_132123_album cannot be reverted.\n";

        return false;
    }
    */
}
