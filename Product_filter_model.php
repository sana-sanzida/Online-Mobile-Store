<?php

class Product_filter_model extends CI_Model
{
 function fetch_filter_type($type)
 {
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('add_products');
  $this->db->where('availabilty', 'In Stock');
  return $this->db->get();
 }
  function make_query($minimum_price, $maximum_price, $brand, $ram, $storage)
 {
  $query = "
  SELECT * FROM add_products WHERE brand !='' ";  
 

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }

  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND brand IN('".$brand_filter."')
   ";
  }

  if(isset($ram))
  {
   $camera_filter = implode("','", $camera);
   $query .= "
    AND Camera IN('".$camera_filter."')
   ";
  }

  if(isset($storage))
  {
   $battery_filter = implode("','", $battery);
   $query .= "
    AND Battery IN('".$battery_filter."')
   ";
  }
  return $query;
 }


 function count_all($minimum_price, $maximum_price, $brand, $camera, $battery)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $brand, $camera, $battery);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start, $minimum_price, $maximum_price, $brand, $camera, $battery)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $brand, $camera, $battery);


  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   {
    $output .= '
    <div class="col-sm-4 col-lg-3 col-md-3">
     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
      <img src="'.base_url().'images/'. $row['Image'] .'" alt="" class="img-responsive" >
       <h4 class="card-title text-danger">Price: '. number_format($row['price']) .'/- </h4>
        <b>NAME: </b> '.$row['name'].'<br />
      <b> BRAND:</b> '.$row['brand'].' <br />
       <b>CAMERA: </b> '.$row['Camera'].' GB<br />
      OS:  </b> '.$row['Operating_System'].' GB </p>
     </div>
    </div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }

}

?>