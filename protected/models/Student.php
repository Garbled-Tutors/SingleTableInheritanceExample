<?php

class Student extends User
{
	const GATHER_PERSONAL_INFORMATION = true;
	public function defaultScope(){
		 return array(
			   'condition'=>'role = "student"',
				  );
	}
}


