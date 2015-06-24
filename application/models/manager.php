<?php

/**
 * Description of manager
 *
 * @author Faizan Ayubi
 */
class Manager extends Shared\Model {

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
    protected $_zone;

    /**
     * @column
     * @readwrite
     * @type boolean
     */
    protected $_admin;

}
