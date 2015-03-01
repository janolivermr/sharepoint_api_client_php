<?php namespace Sharepoint\API;


class SPFolders extends SPClientAbstract {
    public $name;
    public $itemCount;
    public $serverRelativeUrl;
    public $timeCreated;
    public $timeUpdated;
    public $uuid;

    public function __construct(SPClient $client){
        parent::__construct($client);
    }

    public function find($path){
        $result = $this->client->apiRequest('/files/getByPath(\''.trim($path, " \t\n\r\0\x0B/").'\')', 'GET');
        if($result['status'] == 200){
            return $result['body'];
        }else{
            return $result['status'];
        }
    }

    public function findAll(){
        $result = $this->client->apiRequest('/files', 'GET');
        if($result['status'] == 200){
            return $result['body']->value;
        }else{
            return $result['status'];
        }
    }

    public function findAllInside($path){
        $result = $this->client->apiRequest('/files/getByPath(\''.trim($path, " \t\n\r\0\x0B/").'\')/children', 'GET');
        if($result['status'] == 200){
            return $result['body']->value;
        }else{
            return $result['status'];
        }
    }

    public function create($path){
        $result = $this->client->apiRequest('/files/getByPath(\''.trim($path, " \t\n\r\0\x0B/").'\')', 'PUT');
        if($result['status'] == 201){
            return $result['body'];
        }else{
            return $result['status'];
        }
    }

    public function uploadFile($path, $content){
        $result = $this->client->apiRequest('/files/getByPath(\''.trim($path, " \t\n\r\0\x0B/").'\')/content', 'PUT', $content, array('Content-Type' => 'text/plain'));
        if($result['status'] == 201){
            return $result['body'];
        }else{
            return $result['status'];
        }
    }
}