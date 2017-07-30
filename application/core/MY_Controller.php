<?php
class MY_Controller extends CI_Controller
{
	  public function is_logged_in()
    {
        $user = $this->session->userdata('user_id');
        return isset($user);
    }
}