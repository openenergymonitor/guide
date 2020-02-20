<?php

define('EMONCMS_EXEC', 1);
require "php/core.php";
$path = get_application_path();

$q_parts = explode("/",$_GET['q']);
if (!isset($q_parts[1])) $q_parts[1] = "index";
$page = $q_parts[0]."/".$q_parts[1];

include "php/Parsedown.php";
$Parsedown = new Parsedown();

$content_error = false;
if (!$content = file_get_contents("source/$page.markdown")) {
    $content_error = true;
    $title = "Page not found";
    $content = "Could not open source/$page.markdown";
}

if (!$content_error) {
    // Find title
    $title = "";
    $title_pos = strpos($content,"title:")+6;
    for ($i=0; $i<100; $i++) {
        $title .= $content[$title_pos+$i];
        if ($content[$title_pos+$i]=="\n") break;
    }
    $title = str_replace('"','',$title);

    // Remove first 10 lines
    for ($i=0; $i<11; $i++) $content = preg_replace('/^.+\n/', '', $content);

    // Fix images
    $content = str_replace("/images",$path."source/images",$content);
    
    // Fix links
    $content = str_replace("(/setup","(".$path."setup",$content);
    $content = str_replace("(/technical","(".$path."technical",$content);
    $content = str_replace("(/emoncms","(".$path."emoncms",$content);
    $content = str_replace("(/applications","(".$path."applications",$content);
    $content = str_replace("(/integrations","(".$path."integrations",$content);
        
    // Filter out linkable title
    $content = str_replace("{% linkable_title","",$content);
    $content = str_replace("%}","",$content);

    // Parse markdown
    $content = $Parsedown->text($content);
}

$output = array("content"=>$content, "title"=>$title);

echo view("php/theme.php", $output);

