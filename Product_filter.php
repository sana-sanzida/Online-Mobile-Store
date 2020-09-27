<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_filter extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('product_filter_model');
 }

 function index()
 {
  $data['brand'] = $this->product_filter_model->fetch_filter_type('brand');
  $data['camera'] = $this->product_filter_model->fetch_filter_type('Camera');
  $data['battery'] = $this->product_filter_model->fetch_filter_type('Battery');
  $this->load->view('product_filter', $data);
 }
 function fetch_data()
 {
  $minimum_price = $this->input->post('minimum_price');
  $maximum_price = $this->input->post('maximum_price');
  $brand = $this->input->post('brand');
  $camera = $this->input->post('camera');
  $battery = $this->input->post('battery');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->product_filter_model->count_all($minimum_price, $maximum_price, $brand, $camera, $battery);
  $output = array(
   'product_list'   => $this->product_filter_model->fetch_data($minimum_price, $maximum_price, $brand, $camera, $battery)
  );
  echo json_encode($output);
 }




?>