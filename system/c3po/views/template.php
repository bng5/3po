<?php

$this->load->helper('url');
$this->load->view('header');
echo "<br />\n";
echo index_page();
echo "<br />\n";
echo site_url(array("news","local","123"));
echo "<br />\n";
echo base_url();
echo "<br />\n";

$this->load->view($vista);
$this->load->view('footer');

?>