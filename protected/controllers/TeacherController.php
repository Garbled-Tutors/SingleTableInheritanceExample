<?php

class TeacherController extends UserController
{
	protected $class_name = 'Teacher';
	protected $lower_case_class_name = 'teacher';
	protected $plural_class_name = 'Teachers';
	protected $form_name = 'teacher-form';
	protected $gather_personal_information = Teacher::GATHER_PERSONAL_INFORMATION;
}
