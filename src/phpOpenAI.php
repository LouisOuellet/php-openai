<?php

//Declaring namespace
namespace LaswitchTech\phpOpenAI;

class phpOpenAI {

  protected $Token = null;
  protected $cURL = null;
  protected $Headers = null;
  protected $Data = null;
  protected $Result = null;
  private $URL = 'https://api.openai.com/v1/completions';

  public function __construct($token){
    if(is_string($token)){
      $this->Token = $token;
      $this->Headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $this->Token,
      ];
    }
  }

  public function request($data = []){

    // Convert Data to String
    if(is_array($data)){ $data = json_encode($data); }
    $this->Data = $data;

    // Initiate cURL
    $this->cURL = curl_init($this->URL);

    // Configure cURL
    curl_setopt($this->cURL, CURLOPT_POST, 1);
    curl_setopt($this->cURL, CURLOPT_POSTFIELDS, $this->Data);
    curl_setopt($this->cURL, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($this->cURL, CURLOPT_HTTPHEADER, $this->Headers);

    // Execute cURL
    $this->Result = curl_exec($this->cURL);

    // Close cURL
    curl_close($this->cURL);

    // Format Results
    $this->Result = json_decode($this->Result,true);

    return $this->Result;
  }
}
