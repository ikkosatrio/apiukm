<?php

class Migration_Create_table_token extends CI_Migration {

	public function up()
	{
        $this->dbforge->add_field([
            'id'			=> [
                'type'			=> 'int',
                'auto_increment'=>	true
            ],
            'AccessToken'			=> [
                'type'			=>	'VARCHAR',
                'constraint'	=>	'255'
            ],
            'MemberID'			=> [
                'type'			=> 'int',
            ],
            'created_at'	=> [
                'type'			=>	'TIMESTAMP',
            ],
            'updated_at'	=> [
                'type'			=>	'TIMESTAMP',
            ]

        ]);

		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('Token');
	}

	public function down()
	{
		$this->dbforge->drop_table('Token');
	}
}