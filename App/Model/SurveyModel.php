<?php

class Survey
{
    private $title;
    private $responses;
    private $creationDate;
    private $creator;

    public function __construct($title, $responses, $creationDate, $creator)
    {
        $this->title = $title;
        $this->responses = $responses;
    }

    /**
     * @param string $title
     * @return $this|string
     */
    public function setTitle(string $title) :string
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
     * @return $this|array
     */
    public function setResponses(array $responses) :array
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

    /**
     * @param int $creationDate
     * @return $this|DateTime
     */
    public function setCreationDate(int $creationDate) :DateTime
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param string $creator
     * @return $this|string
     */
    public function setCreator(string $creator) :string
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }
}