<?php

namespace Paynl\IDIN\Result;

/**
 * Base class for the results of the API
 *
 * @author Jorn Bakker <jorn@pay.nl>
 */
class Result
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * Result constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->data['request'];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}