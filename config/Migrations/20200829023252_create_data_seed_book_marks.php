<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateDataSeedBookMarks extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('bookmarks', 200, [
            'title' => function() use ($faker){
                return $faker->sentence($nbWords = 3, $variableNBWords = true );
            },
            'description' => function() use ($faker){
                return $faker->paragraph($nbSentences = 3, $variableNBSentences = true );
            },
            'url' => function() use ($faker){
                return $faker->url;
            },
            'created' => function() use ($faker){
                return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
            },
            'modified' => function() use ($faker){
                return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
            },
            'user_id' => function() {
                return rand(1, 51);
            }
        ]);
        $populator->execute(); 
    }    
}
