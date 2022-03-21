<?php

use yii\db\Migration;

/**
 * Class m220321_132143_photo
 */
class m220321_132143_photo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
        ]);

        $this->createIndex(
            'index_album_id',
            'photo',
            'album_id'
        );

        $this->addForeignKey(
            'fk_album_id',
            'photo',
            'album_id',
            'album',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220321_132143_photo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220321_132143_photo cannot be reverted.\n";

        return false;
    }
    */
}
