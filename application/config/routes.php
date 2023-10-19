<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'crm_panel/show_task_list';
$route["my-tasks"] = "My_Tasks_Controller/index";
$route["my-tasks/task/(:num)"] = "My_Tasks_Controller/show_sub_task_list/$1";
$route["admin-panel"] = "Admin_Panel_Controller/index";
$route["task/(:num)"] = 'crm_panel/show_sub_task_list/$1';
$route['create-task'] = 'Create_Task_Сontroller/index';
$route['create-task/create'] = 'Create_Task_Сontroller/create';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
