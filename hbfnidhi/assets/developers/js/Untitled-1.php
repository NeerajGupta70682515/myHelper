<?php 
$sel_cms = "select * from tbl_cms_pages Where status ='1' and friendly_url='connect'"; 
$cms_qry = $this->db->query($sel_cms);
$list_cms = $cms_qry->result_array();
$srv_titl = $list_cms[0]['page_description'];	
echo $srv_titl; 
?>