<?php

use yii\db\Migration;

/**
 * Class m221210_052259_tabla_columnista
 */
class m221210_052259_tabla_columnista extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Columnista', [
            'id' => $this->primaryKey(),
            //Como el sólo representa un valor único, el id del columnista que viene desde el mercurio debería ser un valor aparte
            //tal vez indexado también.
            'columnista_id' => $this->integer()->unique(),
            'nombre' => $this->string()->notNull(),
            'url' => $this->string()->notNull()->unique(),
        ]);

        
        $this->createIndex(
            'idx-Columnista-columnista_id',
            'Columnista',
            'columnista_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-Columnista-columnista_id',
            'Columnista'
        );

        $this->dropTable('Columnista');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221210_052259_tabla_columnista cannot be reverted.\n";

        return false;
    }
    */
}
