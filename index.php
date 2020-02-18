<?php

define('EMONCMS_EXEC', 1);
require "php/core.php";
$path = get_application_path();

$q_parts = explode("/",$_GET['q']);
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

    // Remove first 10 lines
    for ($i=0; $i<11; $i++) $content = preg_replace('/^.+\n/', '', $content);

    // Fix images
    $content = str_replace("/images",$path."source/images",$content);

    // Filter out linkable title
    $content = str_replace("{% linkable_title","",$content);
    $content = str_replace("%}","",$content);

    // Parse markdown
    $content = $Parsedown->text($content);
}

$output = array("content"=>$content, "title"=>$title);

echo view("php/theme.php", $output);

