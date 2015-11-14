<?php

use app\models\Landing;
use yii\db\Migration;

class m151114_185219_landing_update extends Migration
{
    public function safeUp()
    {
        $this->addColumn(Landing::tableName(),'is_public', 'tinyint(1) NOT NULL DEFAULT 1');
    }

    public function safeDown()
    {
        $this->dropColumn(Landing::tableName(),'is_public');
    }
}
