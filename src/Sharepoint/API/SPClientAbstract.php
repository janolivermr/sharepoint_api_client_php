<?php namespace Sharepoint\API;


abstract class SPClientAbstract
{

    protected $client;

    public function __construct(SPClient $client)
    {
        $this->client = $client;
    }
}