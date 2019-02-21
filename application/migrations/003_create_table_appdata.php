<?php

class Migration_Create_table_appdata extends CI_Migration {

	public function up()
	{
        $this->dbforge->add_field([
            'id'			=> [
                'type'			=> 'int',
                'auto_increment'=>	true
            ],
            'AppsName'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'ClientID'			=> [
                'type'			=> 'VARCHAR',
                'constraint'	=>	'255'
            ],
            'created_at'	=> [
                'type'			=>	'TIMESTAMP',
            ],
            'updated_at'	=> [
                'type'			=>	'TIMESTAMP',
            ]

        ]);

		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('AppData');
	}

	public function down()
	{
		$this->dbforge->drop_table('AppData');
	}
}