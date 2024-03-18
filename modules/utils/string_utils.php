<?php
// Remove any query string from the URL

function parseUrl($referer){
    $refererParts = parse_url($referer);
    $refererWithoutQuery = isset($refererParts['scheme'], $refererParts['host'], $refererParts['path']) ? $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'] : '';
    
    return $refererWithoutQuery;
}

?>