<?php

use yii\db\Migration;

/**
 * Class m220321_143740_seeders
 */
class m220321_143740_seeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create();

        for ($u = 0; $u < 10; $u++) {
            $this->insert(
                'user',
                [
                    'first_name' => $faker->name,
                    'last_name' => $faker->name,
                ]
            );
            $user_id = Yii::$app->db->getLastInsertID();
            for ($a = 0; $a < 10; $a++) {
                $this->insert(
                    'album',
                    [
                        'title' => $faker->name,
                        'user_id' => $user_id
                    ]
                );
                $fake_urls = [
                    'https://pixabay.com/illustrations/smartphone-phone-call-iphone-4103051/',
                    'https://pixabay.com/illustrations/smartphone-phone-call-iphone-4103051/',
                    'https://pixabay.com/illustrations/smartphone-phone-call-iphone-4103051/',
                    'https://pixabay.com/illustrations/smartphone-phone-call-iphone-4103051/',
                    'https://pixabay.com/illustrations/smartphone-phone-call-iphone-4103051/'
                ];
                $faker = \Faker\Factory::create();
                $album_id = Yii::$app->db->getLastInsertID();
                for ($p = 0; $p < 10; $p++) {
                    $this->insert(
                        'photo',
                        [
                            'title'         => $faker->name,
                            'url'       => $fake_urls[array_rand($fake_urls)],
                            'album_id' => $album_id
                        ]
                    );
                }
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220321_143740_seeders cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220321_143740_seeders cannot be reverted.\n";

        return false;
    }
    */
}
