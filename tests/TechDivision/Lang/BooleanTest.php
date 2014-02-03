<?php

/**
 * License: GNU General Public License
 *
 * Copyright (c) 2009 TechDivision GmbH.  All rights reserved.
 * Note: Original work copyright to respective authors
 *
 * This file is part of TechDivision GmbH - Connect.
 *
 * faett.net is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * faett.net is distributed in the hope that it will be useful,
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

require_once "TechDivision/Lang/Boolean.php";

/**
 * This is the test for the Boolean class.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_BooleanTest extends PHPUnit_Framework_TestCase {

	/**
	 * This test checks the resolved class name.
	 *
	 * @return void
	 */
	public function testGetClass()
	{
		// check for the correct class name
		$this->assertEquals(
			'TechDivision_Lang_Boolean',
		    TechDivision_Lang_Boolean::__getClass()
		);
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid boolean value TRUE.
	 *
	 * @return void
	 */
	public function testToStringWithBooleanValueTrue()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean(true);
		// check that the two booleans are equal
		$this->assertEquals('true', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'true'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueTrue()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('true');
		// check that the two booleans are equal
		$this->assertEquals('true', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'on'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueOn()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('on');
		// check that the two booleans are equal
		$this->assertEquals('true', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'yes'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueYes()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('yes');
		// check that the two booleans are equal
		$this->assertEquals('true', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'y'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueY()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('y');
		// check that the two booleans are equal
		$this->assertEquals('true', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid boolean value FALSE.
	 *
	 * @return void
	 */
	public function testToStringWithBooleanValueFalse()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean(false);
		// check that the two boolean are equal
		$this->assertEquals('false', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'false'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueFalse()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('false');
		// check that the two boolean are equal
		$this->assertEquals('false', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'off'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueOff()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('off');
		// check that the two boolean are equal
		$this->assertEquals('false', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'no'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueNo()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('no');
		// check that the two boolean are equal
		$this->assertEquals('false', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * with a valid string value 'n'.
	 *
	 * @return void
	 */
	public function testToStringWithStringValueN()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('n');
		// check that the two boolean are equal
		$this->assertEquals('false', $boolean->__toString());
	}

	/**
	 * This test checks the Boolean's toString() method
	 * returns a valid TechDivision_Lang_String instance.
	 *
	 * @return void
	 */
	public function testMethodToStringWithStringValueN()
	{
	    // initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean(true);
		// check that the two boolean are equal
		$this->assertEquals(
			new TechDivision_Lang_String('true'), 
			$boolean->toString()
		);
	}

	/**
	 * This test checks the Boolean's __constructor() method
	 * by expecting an exception.
	 *
	 * @return void
	 */
	public function testConstructorWithClassCastException()
	{
	    // set the expected exception
	    $this->setExpectedException(
	    	'TechDivision_Lang_Exceptions_ClassCastException'
	    );
	    // try to initialize a new Boolean instance
	    $boolean = new TechDivision_Lang_Boolean('xxx');
	}
}