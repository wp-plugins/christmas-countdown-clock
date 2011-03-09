<?php

function ccdc_print_thegroup_list($group, $group_list)
{

	foreach($group_list as $k => $v)
	{
		$check_value = "";
		if ($group == $k){
	   		$check_value = " SELECTED ";
		}

		$output_string = '<option value="' . $k . '" ';
		$output_string .= $check_value . '>';
		$output_string .= $k . '</option>';
		echo $output_string;
		echo "\n";

	}

	return $group_name;
}


function ccdc_print_thecountdown_list($group, $countdown, $countdown_list)
{
	//
	//	Countdown list
	//	$countdown_list[$group_name][$countdown_name]['countdown_code'];


	foreach($countdown_list[$group] as $k=>$v)
	{
		$check_value = "";
		if ($countdown == $k){
	   		$check_value = ' SELECTED ';
		}
		echo '<option value="'.$k.'" '.$check_value .'>'.$k.'</option>';
		echo "\n";
	}

	return $countdown;

}



// This function print for selector clock size list

function ccdc_print_thesize_list($size){
	 $size_list = array("50","75","100","125", "150","180","200","250","300", "400");

	 echo "\n";
	foreach($size_list as $isize)
	{
		$check_value = "";
		if ($isize == $size)
	   		$check_value = ' SELECTED ';
		echo '<option value="'.$isize.'" '.$check_value .'>'.$isize.'</option>';
		echo "\n";
	}
}


// This function print the day of the month list

function ccdc_print_thedays_list($day){

	 echo "\n";
	 $ii=1;
	while ($ii <= 31)
	{
		$check_value = "";
		if ($ii == $day)
	   		$check_value = ' SELECTED ';
		echo '<option value="'.$ii.'" '.$check_value .'>'.$ii.'</option>';
		echo "\n";
		$ii++;
	}
}

// This function print the month list

function ccdc_print_themonth_list($month){
	 $months = array ("blank","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

	 echo "\n";
	 $ii=1;
	while ($ii <= 12)
	{
		$check_value = "";
		if ($ii == $month)
	   		$check_value = ' SELECTED ';
		echo '<option value="'.$ii.'" '.$check_value .'>'.$months[$ii].'</option>';
		echo "\n";
		$ii++;
	}

	# add one

}


// This function print the month list

function ccdc_print_theyear_list($year){

	 echo "\n";
	 $ii=1980;
	while ($ii <= 2030)
	{
		$check_value = "";
		if ($ii == $year)
	   		$check_value = ' SELECTED ';
		echo '<option value="'.$ii.'" '.$check_value .'>'.$ii.'</option>';
		echo "\n";
		$ii++;
	}
}





// This function print for selector clock color list

function ccdc_print_textcolor_list($text_color){

	 $color_list =array(
		   "#FF0000" => "Red",
		   "#CC033C" =>"Crimson",
		   "#FF6F00" =>"Orange",
		   "#FFCC00" =>"Gold",
		   "#009000" =>"Green",
		   "#00FF00" =>"Lime",
  		   "#0000FF" => "Blue",
		   "#000090" =>"Navy",
		   "#FE00FF" =>"Indigo",
		   "#F99CF9" =>"Pink",
		   "#900090" =>"Purple",
		   "#000000" =>"Black",
		   "#FFFFFF" =>"White",
		   "#DDDDDD" =>"Grey",
		   "#666666" =>"Gray"
         );

	 echo "\n";
	foreach($color_list as $key=>$tcolor)
	{
		$check_value = "";
		if ($text_color == $key)
	   		$check_value = ' SELECTED ';

		$white_text = "";
		if ($key == "#000000" OR $key == "#000090" OR $key == "#666666" OR $key == "#0000FF" )
	   		$white_text = ';color:#FFFFFF ';
		echo '<option value="'.$key.'" style="background-color:'.$key. $white_text .'" '.$check_value .'>'.$tcolor.'</option>';
		echo "\n";
	}


}


// This function print for selector clock color list

function ccdc_print_bordercolor_list($text_color){

print "<br> TEXT COLOR:"  . $text_color;

	 $color_list =array(
	      "#FF0000" => "Red",
	      "#CC033C" => "Crimson",
	      "#FF6F00" => "Orange",
	      "#FFCC00" => "Gold",
	      "#009000" => "Green",
	      "#00FF00" => "Lime",
	      "#963939" => "Brown",
	      "#C69633" => "Brass",
	      "#0000FF" => "Blue",
	      "#000090" => "Navy",
	      "#FE00FF" => "Indigo",
	      "#F99CF9" => "Pink",
	      "#900090" => "Purple",
	      "#000000" => "Black",
	      "#FFFFFF" => "White",
	      "#DDDDDD" => "Grey",
	      "#666666" => "Gray",
	      "#F6F9F9;" => "Silver");


	 echo "\n";
	foreach($color_list as $key=>$tcolor)
	{
		$check_value = "";
		if ($text_color == $key)
	   		$check_value = ' SELECTED ';

		$white_text = "";
		if ($key == "#000000" OR $key == "#000090" OR $key == "#666666" OR $key == "#0000FF" )
	   		$white_text = ';color:#FFFFFF ';
		echo '<option value="'.$key.'" style="background-color:'.$key. $white_text .'" '.$check_value .'>'.$tcolor.'</option>';
		echo "\n";
	}



}


// This function print for selector clock color list

function ccdc_print_backgroundcolor_list($text_color){

	 $color_list =array(
	       "#FF0000" => "Red",
	       "#CC033C" => "Crimson",
	       "#FF6F00" => "Orange",
	       "#F9F99F" => "Golden",
	       "#FFFCCC" => "Almond",
	       "#F6F6CC" => "Beige",
	       "#209020" => "Green",
	       "#963939" => "Brown",
	       "#00FF00" => "Lime",
      	       "#99CCFF" => "Light Blue",
	       "#000090" => "Navy",
	       "#FE00FF" => "Indigo",
	       "#F99CF9" => "Pink",
	       "#993CF3" => "Violet",
	       "#000000" => "Black",
	       "#FFFFFF" => "White",
	       "#DDDDDD" => "Grey",
	       "#666666" => "Gray",
	       "#F6F9F9;" => "Silver");


	 echo "\n";
	foreach($color_list as $key=>$tcolor)
	{
		$check_value = "";
		if ($text_color == $key)
	   		$check_value = ' SELECTED ';

		$white_text = "";
		if ($key == "#000000" OR $key == "#000090" OR $key == "#666666" OR $key == "#0000FF" )
	   		$white_text = ';color:#FFFFFF ';
		echo '<option value="'.$key.'" style="background-color:'.$key. $white_text .'" '.$check_value .'>'.$tcolor.'</option>';
		echo "\n";
	}

}



// This function print for selector clock color list

function ccdc_print_type_list($type){

	 $type_list =array(
	       "3010" => "Compact",
	       "3011" => "Horizontal",
	       "3003" => "Fireworks",
	       "3015" => "Compact with Background",
	       "3014" => "Vertical",
	       "3012" => "Square",
	       "3013" => "Vertical Large"
	 );


	 echo "\n";
	foreach($type_list as $key=>$ttype)
	{
		$check_value = "";
		if ($type == $key)
	   		$check_value = ' SELECTED ';

		echo '<option value="'.$key.'" style="background-color:'.$key .'" '.$check_value .'>'.$ttype.'</option>';
		echo "\n";
	}

}


// This function print for timezone selector

function ccdc_print_timezone($timezone){


	$file_location = dirname(__FILE__)."/dropdown.ser"; 
	if ($fd = fopen($file_location,'r')){
		$dropdown_ser = fread($fd,filesize($file_location));
		fclose($fd);
	}
	$dropdown = array();
	$dropdown = unserialize($dropdown_ser);

	foreach ($dropdown as $tz_line)
	{
		$selected = "";
		if($tz_line['timezone'] == $timezone)
			$selected = "SELECTED";

		if($tz_line['timezone'] == "UTC"){
			$tz_line['name'] = "GMT";
			$tz_line['timezone'] = "UTC";
		}
		elseif($tz_line['timezone'] == "Kwajalein")
			$tz_line['UTCoffset'] = "-12:00";

		if($tz_line['UTCoffset'] == "+00:00") 
			$tz_line['UTCoffset'] = "(UTC)";
		else
			$tz_line['UTCoffset'] = "(UTC " . $tz_line['UTCoffset'] . ")";

		echo '<option value="'. $tz_line['timezone'].'" '.$selected . '>'.$tz_line['UTCoffset']." ".$tz_line['name']."</option>";
		echo "\n";
	}

}


?>