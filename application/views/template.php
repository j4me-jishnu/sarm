<?php
$this->load->view('template/header',@$color_change);
$this->load->view('template/left_navigation');
$this->load->view($body);
$this->load->view('template/footer');
$this->load->view($script);
?>