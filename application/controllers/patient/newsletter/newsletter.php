<?php

class Newsletter extends CI_Controller {


public function index()
{
	$this->load->view('newsletter/Responsive_Template1.html');
}

public function automation()
{
$this->load->view('newsletter/newone.html');

}
public function reporting()
{
	$this->load->view('newsletter/index.html');
}
public function cancellation()
{
	$this->load->view('newsletter/AppoinmentCancellation.html');
}
public function collective()
{
	$this->load->view('newsletter/newsletter.html');
}
}

?>