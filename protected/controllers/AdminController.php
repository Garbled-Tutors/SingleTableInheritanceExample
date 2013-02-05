<?php

class AdminController extends UserController
{
	protected $class_name = 'Admin';
	protected $lower_case_class_name = 'admin';
	protected $plural_class_name = 'Admins';
	protected $form_name = 'admin-form';
	protected $gather_personal_information = false;
}
