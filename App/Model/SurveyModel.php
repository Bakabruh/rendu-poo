<?php

class Survey
{
    private $title;
    private $responses;

    public function __construct($title, $responses)
    {
        $this->title = $title;
        $this->responses = $responses;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param array $responses
     * @return $this
     */
    public function setResponses(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponses()
    {
        return $this->responses;
    }
}