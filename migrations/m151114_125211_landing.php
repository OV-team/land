<?php

use yii\db\Schema;
use yii\db\Migration;

class m151114_125211_landing extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            'landing',
            [
                'id'        => Schema::TYPE_PK . ' AUTO_INCREMENT',
                'user_id'   => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'name'      => Schema::TYPE_STRING . '(50) NOT NULL',
                'domain_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'status'    => "enum('new','enabled','disabled')" . ' NOT NULL DEFAULT "new"',
                't_created' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
                't_updated' => Schema::TYPE_TIMESTAMP . '',
            ],
            $tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('landing');
    }
}
