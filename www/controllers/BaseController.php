<?php
  class BaseController
  {
    /**
     * Get query string parameters from the URL.
     * 
     * @return array
     */
    protected function getQueryStringParams()
    {
      parse_str($_SERVER['QUERY_STRING'], $query);
      return $query;
    }

    /**
     * Get query string parameters from the URL.
     * 
     * @return array
     */
    protected function getBody()
    {
      return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array())
    {
      header_remove('Set-Cookie');

      // Add each headers.
      if (is_array($httpHeaders) && count($httpHeaders)) {
        foreach ($httpHeaders as $httpHeader) {
          header($httpHeader);
        }
      // Else add 200 status with JSON format.
      } else {
        header('Content-Type: application/json');
        header('HTTP/1.1 200 OK');
      }

      // Output the data.
      echo $data;
      exit;
    }
  }

?>
