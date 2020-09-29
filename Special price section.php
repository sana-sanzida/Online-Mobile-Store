<?php
defined('BASEPATH') OR exit('No direct script access allowed');


char brandName;
int Brandquantity;

class Special_Price_Section extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Special price section');
	}
	public function viewSpecialpriceesec(brandName)
	{
		brandName="Brand A"
		brandName="Brand B";
		echo "<h1>".$brandName;
		echo"<h2>".$brandName;

	}
    
    public function searchSpecialpricesec(brandName)
    
    {
        brandName="Brand A"
		brandName="Brand B";
		echo "<h1>".$brandName;
		echo"<h2>".$brandName;

    }

    protected function updateSpecialpricesec()
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
