<?php

// ------------------------------------------------------------------
// Load OpenEnergyMonitor guide on the fly using PHP
// - assumes git repository is cloned to non html location
// - guide/php directory is simlinked to /var/www/ location
// ------------------------------------------------------------------

// Get install path
$cwd = str_replace("/php","",getcwd());

define('EMONCMS_EXEC', 1);
require "core.php";
$path = get_application_path();

// unfiltered query
$q = $_GET['q'];
// Basic filtering
$q = preg_replace('/[^\p{N}\p{L}_.\-\/]/u','',$q);

// find file extention and re-route images
$q_parts = explode(".",$q);
$q_len = count($q_parts);
if ($q_len==2) {
    if (in_array(strtolower($q_parts[1]),array('png','jpg','jpeg'))) {
        $ext = $q_parts[1];
        header("Content-Type: image/$ext");
        echo file_get_contents("$cwd/$q");
        die;
    } else {
        print "Invalid file ext"; die;
    }
} else if ($q_len>2) {
    print "Invalid query"; die;
}

// Page path
$q_parts = explode("/",$q_parts[0]);
$q_len = count($q_parts);
if (!isset($q_parts[1])) $q_parts[1] = "index";
$page = $q_parts[0]."/".$q_parts[1];

// Parsedown library converts markdown to html
include "Parsedown.php";
$Parsedown = new Parsedown();

// Load page
$content_error = false;
if (!$content = file_get_contents("$cwd/source/$page.markdown")) {
    $content_error = true;
    $title = "Page not found";
    $content = "Could not open $page.markdown";
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

// Wrap output in theme and print
echo view("theme.php",array("content"=>$content, "title"=>$title));

