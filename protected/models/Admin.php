<?php

class Admin extends User
{
	const GATHER_PERSONAL_INFORMATION = false;

	public function defaultScope(){
		 return array(
			   'condition'=>'role = "admin"',
				  );
	}
}

