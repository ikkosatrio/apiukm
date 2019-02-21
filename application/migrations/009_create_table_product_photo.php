<?php

class Migration_Create_table_product_photo extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'id_product' => [
                'type' => 'int',
            ],
            'Title'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Description'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Image'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
            ]

        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('ProductPhoto');
    }

    public function down()
    {
        $this->dbforge->drop_table('ProductPhoto');
    }
}