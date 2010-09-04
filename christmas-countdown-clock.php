<?php
/*
Plugin Name: Christmas Countdown Clock
Description: Christmas countdown clock showing days and hours until Christamas day. Select from several designs, sizes, animations and backgrounds 
Author: mycountdown.org
Version: 1.0
Author URI: http://mycountdown.org
Plugin URI: http://mycountdown.org/wordpress-countdown-clock-plugin/
*/



function christmas_countdown_clock_init() 
{

     if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
    	   return; 

    function christmas_countdown_clock_control() 
    {

        $newoptions = get_option('christmas_countdown_clock');
    	$options = $newoptions;
	$options_flag=0;

	//	$group_list[$group_name]['group_code']

	$file_location = dirname(__FILE__)."/group_list.ser"; 
	if ($fd = fopen($file_location,'r')){
		$group_list_ser = fread($fd,filesize($file_location));
		fclose($fd);
	}
	$group_list = array();
	$group_list = unserialize($group_list_ser);


	$file_location = dirname(__FILE__)."/countdown_list.ser"; 
	if ($fd = fopen($file_location,'r')){
		$countdown_list_ser = fread($fd,filesize($file_location));
		fclose($fd);
	}
	$countdown_list = unserialize($countdown_list_ser);

    	if ( empty($newoptions) )
	{
	   $options_flag=1;
      	   $newoptions = array(
	   	'title'=>'Christmas Countdown',
           	'transparentflag'=>'0', 
           	'group' => 'Holiday',
           	'countdown' => 'Christmas',
           	'text1' => '',
           	'text2' => '',
           	'background' => '1',
           	'event_day' => '12',
           	'event_month' => '11',
           	'event_year' => '2010',
           	'size' => '150',
           	'typeflag' => '3010',
           	'text_color' => '#000000',
           	'border_color' => '#963939',
           	'background_color' => '#FFFFFF'
	   );
	}

	if ( $_POST['christmas-countdown-clock-submit'] ) {

	     $options_flag=1;
              $newoptions['title'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-title']));
              $newoptions['titleflag'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-titleflag']));
              $newoptions['transparentflag'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-transparentflag']));
              $newoptions['group'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-group']));
              $newoptions['countdown'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-countdown']));
              $newoptions['text1'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-text1']));
              $newoptions['text2'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-text2']));
              $newoptions['background'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-background']));
              $newoptions['event_day'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-event-day']));
              $newoptions['event_month'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-event-month']));
              $newoptions['event_year'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-event-year']));
              $newoptions['size'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-size']));
              $newoptions['type'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-type']));
              $newoptions['typeflag'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-typeflag']));
              $newoptions['text_color'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-text-color']));
              $newoptions['border_color'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-border-color']));
              $newoptions['background_color'] = strip_tags(stripslashes($_POST['christmas-countdown-clock-background-color']));
        }


      	if ( $options_flag ==1 ) {
              $options = $newoptions;
              update_option('christmas_countdown_clock', $options);
      	}


      	// Extract value from vars

      	$title = htmlspecialchars($options['title'], ENT_QUOTES);
      	$titleflag = htmlspecialchars($options['titleflag'], ENT_QUOTES);
      	$transparent_flag = htmlspecialchars($options['transparentflag'], ENT_QUOTES);
      	$group = htmlspecialchars($options['group'], ENT_QUOTES);
      	$countdown = htmlspecialchars($options['countdown'], ENT_QUOTES);
      	$text1 = htmlspecialchars($options['text1'], ENT_QUOTES);
      	$text2 = htmlspecialchars($options['text2'], ENT_QUOTES);
      	$background = htmlspecialchars($options['background'], ENT_QUOTES);
      	$event_day = htmlspecialchars($options['event_day'], ENT_QUOTES);
      	$event_month = htmlspecialchars($options['event_month'], ENT_QUOTES);
      	$event_year = htmlspecialchars($options['event_year'], ENT_QUOTES);
      	$size = htmlspecialchars($options['size'], ENT_QUOTES);
      	$typeflag = htmlspecialchars($options['typeflag'], ENT_QUOTES);
      	$text_color = htmlspecialchars($options['text_color'], ENT_QUOTES);
      	$border_color = htmlspecialchars($options['border_color'], ENT_QUOTES);
      	$background_color = htmlspecialchars($options['background_color'], ENT_QUOTES);

      	echo '<ul><li style="text-align:center;list-style: none;"><label for="christmas-countdown-clock-title">Christmas Countdown Clock<br> by <a href="http://mycountdown.org">mycountdown.org</a></label></li>';

       	// Get group

       	echo '<label for="christmas-countdown-clock-group">'.
               '<input type="hidden" id="christmas-countdown-clock-group" name="christmas-countdown-clock-group" value="Holiday">';
      	echo '</label>';


       	// Get countdown

       	echo '<label for="christmas-countdown-clock-countdown">'.
               '<input type="hidden" id="christmas-countdown-clock-countdown" name="christmas-countdown-clock-countdown" value="Christmas">';
      	echo '</label>';


	$text1 = $countdown;
	$text2 = "Happy " . $countdown;

	// Event Name 
      	echo '<label for="christmas-countdown-clock-text1">';
        echo '<input type="hidden" id="christmas-countdown-clock-text1" name="christmas-countdown-clock-text1" value="'. $text1 .'">';
      	echo '</label>';

      	// Event Message
      	echo '<label for="christmas-countdown-clock-text2">';
        echo '<input id="christmas-countdown-clock-text2" type="hidden" name="christmas-countdown-clock-text2" value="'. $text2 .'">';
      	echo '</label>';

      	// Set clock type
      	echo '<li style="list-style: none;"><label for="christmas-countdown-clock-typeflag">'.'Clock Type:&nbsp;';
       	echo '<select id="christmas-countdown-clock-typeflag" name="christmas-countdown-clock-typeflag"  style="width:145px" >';
      	ccdc_print_type_list($typeflag);
      	echo '</select></label>';
      	echo '</li>';


       	// Get background

 	if ($typeflag > "3011" )
        {
		$inm_background_files = $countdown_list[$group][$countdown]['nm_background_files'];
		echo '<li style="list-style: none;"><label for="christmas-countdown-clock-background">Background :';
		echo '<select id="christmas-countdown-clock-background" name="christmas-countdown-clock-background" style="width:60%">';
		  if($background == 1) $check_selected = " SELECTED ";
                echo '<option value="1" '. $check_selected .'>default</option>';

                $inmj=1;
              	if  ($typeflag < "3014")
              	  while ($inmj <= $inm_background_files){
                          $jnmj = $inmj+2;
			  $check_selected = "";
			  if($jnmj == $background) $check_selected = " SELECTED ";
                           	   echo "\n<option value=\"$jnmj\" $check_selected >Picture $inmj</option>";
                          $inmj++;
                  }

		  $flash_files = array(-1=> "stars",-2=> "balloons",-3=> "hearts",-4=> "confetti",-5=>"star trails",-6=> "sun-rays");
		  foreach ($flash_files as $kki => $vvi)
		  {		
		  	$check_selected = "";
			 if($kki == $background) $check_selected = " SELECTED ";
			 echo "\n";
                  	echo '<option value="'.$kki.'" '.$check_selected.'">' .$vvi.'</option>';
		  }

      		  echo '</select></label></li>';
        }



      	// Set Clock size
	echo "\n";
      	echo '<li style="list-style: none;text-align:bottom"><label for="christmas-countdown-clock-size">'.'Clock Size: &nbsp;'.
         '<select id="christmas-countdown-clock-size" name="christmas-countdown-clock-size"  style="width:75px">';
      	ccdc_print_thesize_list($size);
      	echo '</select></label></li>';


      	// Set Text Clock color
      	echo '<li style="list-style: none;"><label for="christmas-countdown-clock-text-color">'.'Text Color: &nbsp;';
       	echo '<select id="christmas-countdown-clock-text-color" name="christmas-countdown-clock-text-color"  style="width:75px" >';
      	ccdc_print_textcolor_list($text_color);
      	echo '</select></label>';
      	echo '</li>';


      	// Set Background Clock color
      	echo '<li style="list-style: none;"><label for="christmas-countdown-clock-background-color">'.'Background Color:&nbsp;';
       	echo '<select id="christmas-countdown-clock-background-color" name="christmas-countdown-clock-background-color"  style="width:75px" >';
      	ccdc_print_backgroundcolor_list($background_color);
      	echo '</select></label>';
      	echo '</li>';





	//   Transparent option

	$transparent_checked = "";
	if ($transparent_flag =="1")
	   $transparent_checked = "CHECKED";

	echo "\n";
        echo '<li style="list-style: none;"><label for="christmas-countdown-clock-transparentflag"> Transparent: 
	<input type="checkbox" id="christmas-countdown-clock-transparentflag" name="christmas-countdown-clock-transparentflag" value=1 '.$transparent_checked.' /> 
	</label></li>';

      	// Hidden "OK" button
      	echo '<label for="christmas-countdown-clock-submit">';
      	echo '<input id="christmas-countdown-clock-submit" name="christmas-countdown-clock-submit" type="hidden" value="Ok" />';
      	echo '</label>';


	//	Title header option	
	if($countdown)
		$title = UCWords($countdown) . " Countdown";
	elseif($countdown_name)
		$title = $countdown_name . " Countdown";
	elseif($group_name)
		$title = $group_name . " Countdown";

        echo '<label for="christmas-countdown-clock-title"> <input type="hidden" id="christmas-countdown-clock-title" name="christmas-countdown-clock-title" value="'.$title.'" /> </label>';



	$title_checked = "";
	if ($titleflag =="1")
	   $title_checked = "CHECKED";

	echo "\n";
        echo '<li style="list-style: none;"><label for="christmas-countdown-clock-titleflag"> Countdown Title: 
	<input type="checkbox" id="christmas-countdown-clock-titleflag" name="christmas-countdown-clock-titleflag" value=1 '.$title_checked.' /> 
	</label></li>';

	echo "\n";
        echo '<li style="list-style: none;font-size:9px;text-align:right;margin:20px 0px 0px 0px">*Save after each selection</li>';
	echo '</ul>';


    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //	OUTPUT CLOCK WIDGET
    //
    /////////////////////////////////////////////////////////////////////////////////////////////////////

     function christmas_countdown_clock($args) 
     {

	// Get values 
      	extract($args);

      	$options = get_option('christmas_countdown_clock');

	// Get Title,Location,Size,

      	$title = htmlspecialchars($options['title'], ENT_QUOTES);
      	$titleflag = htmlspecialchars($options['titleflag'], ENT_QUOTES);
      	$transparentflag = htmlspecialchars($options['transparentflag'], ENT_QUOTES);
      	$group = htmlspecialchars($options['group'], ENT_QUOTES);
      	$countdown = htmlspecialchars($options['countdown'], ENT_QUOTES);
      	$text1 = htmlspecialchars($options['text1'], ENT_QUOTES);
      	$text2 = htmlspecialchars($options['text2'], ENT_QUOTES);
      	$background = htmlspecialchars($options['background'], ENT_QUOTES);
      	$event_day = htmlspecialchars($options['event_day'], ENT_QUOTES);
      	$event_month = htmlspecialchars($options['event_month'], ENT_QUOTES);
      	$event_year = htmlspecialchars($options['event_year'], ENT_QUOTES);
      	$size = htmlspecialchars($options['size'], ENT_QUOTES);
      	$type = htmlspecialchars($options['type'], ENT_QUOTES);
      	$typeflag = htmlspecialchars($options['typeflag'], ENT_QUOTES);
      	$text_color = htmlspecialchars($options['text_color'], ENT_QUOTES);
      	$border_color = htmlspecialchars($options['border_color'], ENT_QUOTES);
      	$background_color = htmlspecialchars($options['background_color'], ENT_QUOTES);

	$new_countdown_date = $event_year ."-" . $event_month . "-" . $event_day;

	if(empty($event_day) || empty($event_month) || empty($event_year) )
		$event_time = date('U',time()+3600*24*300);
	else{
		$dateTimeZoneUTC = new DateTimeZone("UTC");
        	$new_dateTimeUTC = new DateTime($new_countdown_date, $dateTimeZoneUTC);
 		$event_time =   $new_dateTimeUTC->format('U') ;
	}


	echo $before_widget; 




	// Output title
	echo $before_title . $title . $after_title; 


	// Output Clock


	$target_url= "http://mycountdown.org/$group_name/";
	if ($countdown_name)
   	   $target_url .= $countdown_name ."/";

	$target_url .= $countdown ."/";
	$group = str_replace(" ", "+", $group);
	$countdown= str_replace(" ", "+", $countdown);
	$group_code = strtolower($group);

	$widget_call_string = 'http://mycountdown.org/wp_countdown-clock.php?group='.$group_code;
	$widget_call_string .= '&countdown='.$countdown;
	$widget_call_string .= '&widget_number='.$typeflag;
	$widget_call_string .= '&text1='.$text1;
	$widget_call_string .= '&text2='.$text2;

	$lgroup = strtolower($group);
	if($lgroup == "special+day" || $lgroup == "my+countdown" || $lgroup == "event")
		  $widget_call_string .= '&event_time='.$event_time;

	$widget_call_string .= '&img='.$background;

	#	IMG

	$transparent_string = "&hbg=0";
	if($transparentflag == 1){
     	     $transparent_string = "&hbg=1";
     	     $background_color="";
	}

	if($titleflag != 1){
	      $noscript_start = "<noscript>";
	      $noscript_end = "</noscript>";
	}


	echo'<!-Christmas Countdown Clock widget - HTML code - mycountdown.org --><div align="center" style="margin:15px 0px 0px 0px">';

	echo $noscript_start . '<div align="center" style="width:140px;border:1px solid #ccc;background:'.$background_color.' ;color:'.$text_color.' ;font-weight:bold">';
	echo '<a style="padding:2px 1px;margin:2px 1px;font-size:12px;line-height:16px;font-family:arial;text-decoration:none;color:'.$text_color. ' ;" href="'.$target_url.'">';
	echo '<img src="http://mycountdown.org/images/countries/'.$group_code.'.png" border=0 style="border:0;margin:0;padding:0">&nbsp;&nbsp;'.$title.'</a></div>' . $noscript_end;

	$text_color = str_replace("#","",$text_color);
	$background_color = str_replace("#","",$background_color);
	$border_color = str_replace("#","",$border_color);

	$widget_call_string .= '&cp3_Hex='.$border_color.'&cp2_Hex='.$background_color.'&cp1_Hex='.$text_color. $transparent_string . $ampm_string. '&fwdt='.$size;


	echo '<script type="text/javascript" src="'.$widget_call_string . '"></script></div><!-end of code-->';




	echo $after_widget;


    }
  
    register_sidebar_widget('Christmas Countdown Clock', 'christmas_countdown_clock');
    register_widget_control('Christmas Countdown Clock', 'christmas_countdown_clock_control', 245, 300);


}


add_action('plugins_loaded', 'christmas_countdown_clock_init');


// This function print for selector clock color list

include("functions.php");


?>