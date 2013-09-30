<?php
/**
 * Plugin Name: import_tool
 * Plugin URI: www.lowrez.net/wp_server/wp-content/plugins
 * Description: A tool for importing JSON dictionary
 * Version: 0.1
 * Author: Jesse Ziegler
 * Author URI: www.lowrez.net
 * License: GPL2
 */
 
function plugin_menu() {
	add_submenu_page('edit.php?post_type=word','Import','Import','read','JSON_IMPORT','import_file');
}

/** Step 3. */
function import_file() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	echo '<html>';
	echo '<body>';
	echo '<form method="post" enctype="multipart/form-data">';
	echo '<label for="file">Filename:</label>';
	echo '<input type="file" name="file1" id="file1" />'; 
	echo '<br />';
	echo '<input type="submit" name="submit" value="Submit" />';
	echo '</form>';
	echo '</body>';
	echo '</html>';

	//to fix this use godaddy absolute path
	$uploadDir = '/home/content/61/10938861/html/upload/';
	$fileExt = end(explode(".",$_FILES['file1']['name']));
	
	if(isset($_POST['submit'])) 
	{
		if($fileExt == "json" || $fileExt == "JSON")
		{
			if ($_FILES["file1"]["error"] > 0) {
				echo "Error: " . $_FILES["file1"]["error"] . "<br />";
			} else {
				move_uploaded_file($_FILES['file1']['tmp_name'], $uploadDir . $_FILES['file1']['name']);
				echo "Location: " . $uploadDir . $_FILES['file1']['name'] . "<br />";
				echo "Upload: " . $_FILES["file1"]["name"] . "<br />";
				echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " Kb<br />";
				
				json_2_pod($uploadDir . $_FILES['file1']['name']);
			}
		}else
		{
			echo "ERROR: Invalid format!";
		}
	} 
}

function json_2_pod($jsonPath)
{
	$string = file_get_contents($jsonPath);
	$json = json_decode($string,true);
	
	$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($string, TRUE)),RecursiveIteratorIterator::SELF_FIRST);

	$iterator = 0;
	$tmpPostTitle = ''; //store the title until we have our definition
	foreach ($jsonIterator as $key => $val) {
		if(is_array($val)) {
			//echo "$key:\n <br />";
		} else {
			if($key == "term")
			{
				$iterator++;
				$tmpPostTitle = $val;
			}
			
			if($key == "definition")
			{
				if($tmpPostTitle!='')
				{
					$pod = pods('word', $words_uploaded);
					$pod->save('jz_post_title',$tmpPostTitle);
					$pod->save('jz_post_body',$val);
					$tmpPostTitle='';
				}
			}
		}
	}
	
	echo "wordcount: " . $iterator . " words";
}

 add_action( 'admin_menu', 'plugin_menu' );
 
 ?>
