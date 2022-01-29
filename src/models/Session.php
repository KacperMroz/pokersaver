<?php

class Session
{
    private $title;
    private $buyin;
    private $cashout;
    private $result;


    public function __construct($title, $buyin, $cashout)
    {
        $this->title = $title;
        $this->buyin = $buyin;
        $this->cashout = $cashout;
        $this->result = $cashout - $buyin;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getBuyin()
    {
        return $this->buyin;
    }

    public function setBuyin($buyin): void
    {
        $this->buyin = $buyin;
    }

    public function getCashout()
    {
        return $this->cashout;
    }

    public function setCashout($cashout): void
    {
        $this->cashout = $cashout;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result): void
    {
        $this->result = $result;
    }





}