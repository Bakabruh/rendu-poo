<?php

namespace App\Model;
use Core\Database;

class Survey extends Database
{
    private $title;
    private $questionNumber;
    private $question1;
    private $question2;
    private $question3;
    private $question4;
    private $creationDate;
    private $creator;

    public function __construct($title, $creationDate, $creator, $questionNumber, $question1, $question2, $question3, $question4)
    {
        $this->title = $title;
        $this->creationDate = $creationDate;
        $this->creator = $creator;
        $this->questionNumber = $questionNumber;
        $this->question1 = $question1;
        $this->question2 = $question2;
        $this->question3 = $question3;
        $this->question4 = $question4;
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
     * @param int $questionNumber
     * @return $this|int
     */
    public function setQuestionNumber(int $questionNumber) :int
    {
        $this->questionNumber = $questionNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestionNumber()
    {
        return $this->questionNumber;
    }

    /**
     * @param string $question1
     * @return $this|string
     */
    public function setQuestion1(string $question1) :string
    {
        $this->question1 = $question1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestion1()
    {
        return $this->question1;
    }

    /**
     * @param string $question2
     * @return $this|string
     */
    public function setQuestion2(string $question2) :string
    {
        $this->question2 = $question2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestion2()
    {
        return $this->question2;
    }

    /**
     * @param string $question3
     * @return $this|string
     */
    public function setQuestion3(string $question3) :string
    {
        $this->question3 = $question3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestion3()
    {
        return $this->question3;
    }

    /**
     * @param string $question4
     * @return $this|string
     */
    public function setQuestion4(string $question4) :string
    {
        $this->question4 = $question4;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestion4()
    {
        return $this->question4;
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