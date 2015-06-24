<?php

/**
 * Description of applicant
 *
 * @author Faizan Ayubi
 */
class Applicant extends Shared\Model {
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_user;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_payment;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_job;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_started;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_ended;
}
