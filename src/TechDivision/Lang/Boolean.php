<?php

/**
 * License: GNU General Public License
 *
 * Copyright (c) 2009 TechDivision GmbH.  All rights reserved.
 * Note: Original work copyright to respective authors
 *
 * This file is part of TechDivision GmbH - Connect.
 *
 * TechDivision_Lang is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * TechDivision_Lang is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 * USA.
 *
 * @package TechDivision_Lang
 */

require_once "TechDivision/Lang/Object.php";
require_once "TechDivision/Lang/String.php";
require_once 'TechDivision/Lang/Exceptions/ClassCastException.php';

/**
 * This class implements functionality to handle
 * a boolean value as object.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_Boolean extends TechDivision_Lang_Object
{

	/**
 	 * The value of the Boolean.
 	 * @var boolean
	 */
	protected $_value = false;

	/**
	 * The accepted values for a Boolean object.
	 * @var array
	 */
    protected $_booleans = array(
        true,
        false,
        1,
        0,
		"1",
		"0",
		"true",
		"false",
		"on",
		"off",
		"yes",
		"no",
		"y",
		"n"
	);

	/**
	 * The boolean representation of
	 * the requested value.
	 *
	 * @var array
	 */
	protected $_values = array(
        true => true,
        false => false,
        1 => true,
        0 => false,
		"1" => true,
		"0" => false,
		"true" => true,
		"false" => false,
		"on" => true,
		"off" => false,
		"yes" => true,
		"no" => false,
		"y" => true,
		"n" => false
	);

    /**
     * Constructs a newly allocated Boolean object that
     * represents the primitive boolean argument.
     *
     * @param boolean $value
     * 		The value to be represented by the Boolean.
     * @throws ClassCastException
     * 		The passed value is not a valid boolean representation
     */
	public function __construct($value)
	{
		if (in_array($value, $this->_booleans, true)) {
			$this->_value = $this->_values[$value];
		} else {
		    throw new TechDivision_Lang_Exceptions_ClassCastException(
		    	'The passed value ' . $value . ' is not a valid Boolean'
		    );
		}
	}

	/**
	 * This method returns the class name as
	 * a string.
	 *
	 * @return string
	 */
	public static function __getClass()
	{
		return __CLASS__;
	}

	/**
	 * Returns the value of this Boolean object as a
	 * boolean primitive.
	 *
	 * @return boolean Holds the value as a boolean primitive
	 */
	public function booleanValue()
	{
		return $this->_value;
	}

	/**
	 * Returns a Boolean with a value represented by the specified String.
	 *
	 * If the passed string has the primitive value TRUE or 1 then the
	 * returned object is initialized with the primitive value TRUE else
	 * with FALSE.
	 *
	 * @param TechDivision_Lang_String
	 * 		Holds the String object to get the Boolean representation for
	 * @return TechDivision_Lang_Boolean
	 * 		The Boolean object representing the specified String.
	 */
	public static function valueOf(TechDivision_Lang_String $string)
	{
		// if the passed value is "true" or "1" then return a new Boolean
		// object initialized with true
		if ($string->equals(new TechDivision_Lang_String("1")) ||
		    $string->equals(new TechDivision_Lang_String("true")) ||
		    $string->equals(new TechDivision_Lang_String("yes")) ||
		    $string->equals(new TechDivision_Lang_String("on")) ||
		    $string->equals(new TechDivision_Lang_String("y"))) {
			return new TechDivision_Lang_Boolean(true);
		}
		// else return a new Boolean object initialized with false
		return new TechDivision_Lang_Boolean(false);
	}

	/**
	 * (non-PHPdoc)
	 * @see TechDivision_Lang_Object::equals()
	 */
	public function equals(TechDivision_Lang_Object $obj)
	{
	    return $this->booleanValue() == $obj->booleanValue();
	}

    /**
     * This object as String returned.
     *
     * @return TechDivision_Lang_String The value as String.
     */
	public function toString()
	{
		return new TechDivision_Lang_String($this->__toString());
	}

	/**
	 * (non-PHPdoc)
	 * @see TechDivision_Lang_Object#__toString()
	 */
	public function __toString()
	{
		// if TRUE, return string 'true'
		if ($this->_value) {
			return 'true';
		}
		// else return string 'false'
		return 'false';
	}
}