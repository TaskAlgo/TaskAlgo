<?php

/**
 * The User Model
 *
 * @author Faizan Ayubi
 */
class User extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate required, min(3), max(255)
     * @label full name
     */
    protected $_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     * 
     * @validate alpha, min(3), max(255)
     * @label email
     */
    protected $_email;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 55
     * 
     * @validate alpha
     * @label gender
     */
    protected $_gender;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(15)
     * @label phone number
     */
    protected $_phone;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, alpha, min(8), max(255)
     * @label password
     */
    protected $_password;
    
}
