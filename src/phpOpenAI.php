<?php

//Declaring namespace
namespace LaswitchTech\phpOpenAI;

class phpOpenAI {

  protected $Token = null;
  protected $cURL = null;
  protected $Headers = null;
  protected $Data = null;
  protected $Result = null;
  private $URL = 'https://api.openai.com/v1/';
  protected $Counters = ["prompt_tokens" => 0,"completion_tokens" => 0,"total_tokens" => 0,"requests" => 0];

  public function __construct($token){
    if(is_string($token)){
      $this->Token = $token;
      $this->Headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $this->Token,
      ];
    }
  }

  protected function request($url, $data){

    // Convert Data to String
    if(is_array($data)){ $data = json_encode($data); }
    $this->Data = $data;

    // Initiate cURL
    $this->cURL = curl_init($url);

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

    // Update Counters
    $this->Counters['requests']++;
    $this->Counters['prompt_tokens'] = $this->Counters['prompt_tokens'] + $this->Result['usage']['prompt_tokens'];
    $this->Counters['completion_tokens'] = $this->Counters['completion_tokens'] + $this->Result['usage']['completion_tokens'];
    $this->Counters['total_tokens'] = $this->Counters['total_tokens'] + $this->Result['usage']['total_tokens'];

    // Return
    return $this->Result;
  }

  public function completions($data = []){
    return $this->request($this->URL . 'completions', $data);
  }

  public function edits($data = []){
    return $this->request($this->URL . 'edits', $data);
  }

  public function moderations($data = []){
    return $this->request($this->URL . 'moderations', $data);
  }

  public function usage(){
    return $this->Counters;
  }
}
