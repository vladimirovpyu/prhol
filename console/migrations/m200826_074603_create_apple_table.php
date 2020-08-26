<?php
// created by command: php yii migrate/create create_apple_table --fields="color:string,date_created:datetime,date_fall:datetime,status:boolean,size:integer"

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apple}}`.
 */
class m200826_074603_create_apple_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apple}}', [
            'id' => $this->primaryKey(),
            'color' => $this->string(),
            'date_created' => $this->datetime(),
            'date_fall' => $this->datetime(),
            'status' => $this->boolean(),
            'size' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apple}}');
    }
}
