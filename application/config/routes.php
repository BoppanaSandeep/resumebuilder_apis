<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'welcome/index';
#region Registration
$route['registrationpage'] = 'registrationPage/postRegister';
$route['rb/login'] = 'registrationPage/LoginRb';
$route['rb/login_status/(:any)'] = 'registrationPage/Reload/$1';
$route['rb/forgot_pwd'] = 'registrationPage/forgotPwd';
#endregion

#region Form Submissions
//Skills
    $route['rb/skills'] = 'formSubmissions/Skills';
    $route['rb/skills_data/(:any)'] = 'formSubmissions/SkillsData/$1';
//Experience and Education
    $route['rb/expedu'] = 'formSubmissions/Expedu';
    $route['rb/expedu_data/(:any)'] = 'formSubmissions/ExpeduData/$1';
#endregion

#region Delete Operations for Skills, Experience and Education
//Delete Skills
    $route['rb/skill_delete_data'] = 'deleteOperations/DeleteSkills';
#endregion

$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
