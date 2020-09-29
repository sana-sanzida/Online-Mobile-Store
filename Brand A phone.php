<?php
defined('BASEPATH') OR exit('No direct script access allowed');

char productName;
char productDetails;
int productPrice;

class BrandA_phone extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Brand A phone');
	}
	public function viewProduct(productName,productDetails,productPrice)
	{
	   return viewProduct();

	}
    

    protected function addProduct(char x)
    {
         return x;

    	}
    protected function deleteProduct(char y)
    {	
     
         return y;
    }

}
