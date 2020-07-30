<?php

function urlAnalyzer($url) {
  if(!filter_var($url, FILTER_VALIDATE_URL)) { return false; }
  $result = [];
  $host = parse_url($url, PHP_URL_HOST);
  $path = parse_url($url, PHP_URL_PATH);  
  $queries = parse_url($url, PHP_URL_QUERY);
  
  $result['host'] = $host;  
  strlen($path) > 0 && $result['path'] = $path;  
  
  if(strlen($queries) > 0) {
      $result["parameters"] = [];
      $queryGroup = explode('&', $queries);
      foreach($queryGroup as $param) {
           $keyValuePair = explode('=',$param);
           $result["parameters"][$keyValuePair[0]] = $keyValuePair[1];
      }    
  }  
  return $result;
}

var_dump(urlAnalyzer('http://hostname.com:9090/user?arg=value&tr=l'));
