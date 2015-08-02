<?php

/**
 * The Query database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Query extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label First Name
     */
    protected $_fname;
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Last Name
     */
    protected $_lname;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 20
     * @index
     * 
     * @validate required, max(8)
     * @label Area Pin Code
     */
    protected $_pin;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Email Address
     */
    protected $_email;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required
     * @label Message
     */
    protected $_message;

}
