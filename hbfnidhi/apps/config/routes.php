<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/


// Admin and modules

$route['adminzone/(:any)']		= "adminzone/$1";


$handle = opendir(FCPATH.'modules');

if ($handle)
{
	while ( false !== ($module = readdir($handle)) )
	{
		// make sure we don't map silly dirs like .svn, or . or ..
		
		if (substr($module, 0, 1) != ".")
		{
			if ( file_exists(FCPATH.'modules/'.$module.'/'.$module.'_routes.php') )
			{
				//echo FCPATH.'modules/'.$module.'/'.$module.'_routes.php'."<br>";
				require_once(FCPATH.'modules/'.$module.'/'.$module.'_routes.php');
			}
				
		}
	}
}
require_once( BASEPATH .'database/DB.php');
$db =& DB();
$query = $db->get('tbl_services');
$result = $query->result();
foreach( $result as $row )
{
    $pageurl = $row->service_url;
	$oldurl = $row->service_url;	
    //$pageurlstr = substr($pageurl,33);	
    //$oldurlstr = substr($oldurl,33);
	
	$route[$pageurl] = 'service/index/'.$pageurl;
}
$route['default_controller'] = "home";
$route['404_override'] = 'pages/not_found';

// cms pages 




/* End of file routes.php */
/* Location: ./application/config/routes.php */



/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
