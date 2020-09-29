<?php
defined('BASEPATH') OR exit('No direct script access allowed');

char brandName;
int Brandquantity;

class New_Phone_Section extends CI_Controller {

	
	public function index()
	{
		$this->load->view('New phone section');
	}
	public function viewNewphonesec(brandName)
	{
		brandName="Brand A"
		brandName="Brand B";
		echo "<h1>".$brandName;
		echo"<h2>".$brandName;

	}
    
    public function searchNewphonesec(brandName)
    {
        brandName="Brand A"
		brandName="Brand B";
		echo "<h1>".$brandName;
		echo"<h2>".$brandName;


    }

    protected function updateNewphonesec()
    {
    	addBrand(char x)
    	{  
    		return x;
    	}

        deleteBrand(char y)
        {
        	return y;
        }
     
    
    }

}
