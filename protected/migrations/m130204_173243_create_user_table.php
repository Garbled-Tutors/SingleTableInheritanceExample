<?php

class m130204_173243_create_user_table extends CDbMigration
{
	public function up()
	{
    $this->createTable('user',
      array('id' => 'pk',
			'username' => 'varchar(100)',
			'role' => 'varchar(10)',
			'password_hash' => 'varchar(60)'));
		$changeme_hash = '$2a$08$Tt1n.BO/z/Pq8vDLlBzTC.Hcd/Iir20d1m.QoxARJMiaArZWA2es.';
		$this->insert('user', array('username'=>'admin', 'role'=>'admin', 'password_hash'=>$changeme_hash));
	}

	public function down()
	{
    $this->dropTable('user');
	}
}
