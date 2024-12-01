<?php
function redirectTo($url)
{
	header("Location: $url");
}

function render($path, $data = [], $templates = false) {
    // Extract data to make it available as variables in the template
    extract($data);
    
    if ($templates) {
        require "templates/$path.php";
    } else {
        require "views/$path.php";
    }
}

