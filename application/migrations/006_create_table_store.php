<?php

class Migration_Create_table_store extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'id_member' => [
                'type' => 'int',
            ],
            'Title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'URLSegment'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'Slogan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'Description' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'Image' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'Province' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'City' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'District' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'ProvinceIDRajaOnkir' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'CityIDRajaOnkir' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'DistrictIDRajaOnkir' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'Address' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
            ]

        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('Store');
    }

    public function down()
    {
        $this->dbforge->drop_table('Store');
    }
}