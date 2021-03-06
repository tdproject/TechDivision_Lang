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

require_once "TechDivision/Lang/Float.php";

/**
 * This is the test for the Float class.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_FloatTest extends PHPUnit_Framework_TestCase {

	/**
	 * This test checks the resolved class name.
	 *
	 * @return void
	 */
	public function testGetClass()
	{
		// check for the correct class name
		$this->assertEquals(
			'TechDivision_Lang_Float',
		    TechDivision_Lang_Float::__getClass()
		);
	}

	/**
	 * This test checks the Floats equal method.
	 *
	 * @return void
	 */
	public function testEquals()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(1.01);
		// check that the two Floats are equal
		$this->assertTrue($float->equals(new TechDivision_Lang_Float(1.01)));
	}

	/**
	 * This test checks the Float's floatValue() method.
	 *
	 * @return void
	 */
	public function testFloatValue()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(1.0005);
		// check that float value of the Float instance
		$this->assertEquals(1.0005, $float->floatValue());
	}

	/**
	 * This test checks the Float's intValue() method.
	 *
	 * @return void
	 */
	public function testIntValue()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(17.1);
		// check that float value of the Float instance
		$this->assertEquals(17, $float->intValue());
	}

	/**
	 * This test checks the Float's doubleValue() method.
	 *
	 * @return void
	 */
	public function testDoubleValue()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(17.05);
		// check that double value of the Float instance
		$this->assertEquals(17.05, $float->doubleValue());
	}

	/**
	 * This test checks the Float's valueOf() method.
	 *
	 * @return void
	 */
	public function testValueOf()
	{
	    // initialize a new Float instance
	    $float = TechDivision_Lang_Float::valueOf(
	        new TechDivision_Lang_String('17.6')
	    );
		// check that the two Float instances are equal
		$this->assertTrue($float->equals(new TechDivision_Lang_Float(17.6)));
	}

	/**
	 * This test checks the Float's valueOf() method.
	 *
	 * @return void
	 */
	public function testValueOfWithNumberFormatException()
	{
	    // set the expected exception
	    $this->setExpectedException(
	    	'TechDivision_Lang_Exceptions_NumberFormatException'
	    );
	    // initialize a new Float instance
	    $int = TechDivision_Lang_Float::valueOf(
	        new TechDivision_Lang_String('!17')
	    );
	}

	/**
	 * This test checks the Floats's parseFloat() method.
	 *
	 * @return void
	 */
	public function testParseFloat()
	{
	    // initialize a new Float instance
	    $float = TechDivision_Lang_Float::parseFloat(
	        new TechDivision_Lang_String('17')
	    );
		// check that the two floats are equal
		$this->assertEquals(17, $float);
	}

	/**
	 * This test checks the Float's parseFloat() method.
	 *
	 * @return void
	 */
	public function testParseFloatWithNumberFormaException()
	{
	    // set the expected exception
	    $this->setExpectedException(
	    	'TechDivision_Lang_Exceptions_NumberFormatException'
	    );
	    // initialize a new Float instance
	    $float = TechDivision_Lang_Float::parseFloat(
	        new TechDivision_Lang_String('!17')
	    );
	}

	/**
	 * This test checks the Float's add() method.
	 *
	 * @return void
	 */
	public function testAdd()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(10.005);
	    $float->add(new TechDivision_Lang_Float(10.105));
        // check the value
	    $this->assertEquals(20.11, $float->floatValue());
	}

	/**
	 * This test checks the Float's subtract() method.
	 *
	 * @return void
	 */
	public function testSubtract()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(10.6);
	    $float->subtract(new TechDivision_Lang_Float(32.6));
        // check the value
	    $this->assertEquals(-22, $float->intValue());
	}

	/**
	 * This test checks the Float's multiply() method.
	 *
	 * @return void
	 */
	public function testMultiply()
	{
	    // initialize a new Float instance
	    $int = new TechDivision_Lang_Float(10.00);
	    $int->multiply(new TechDivision_Lang_Float(10.00));
        // check the value
	    $this->assertEquals(100.00, $int->floatValue());
	}

	/**
	 * This test checks the Float's divide() method.
	 *
	 * @return void
	 */
	public function testDivide()
	{
	    // initialize a new Float instance
	    $int = new TechDivision_Lang_Float(10.00);
	    $int->divide(new TechDivision_Lang_Float(10.00));
        // check the value
	    $this->assertEquals(1.00, $int->floatValue());
	}

	/**
	 * This test checks the Float's divide() method
	 * with an odd result.
	 *
	 * @return void
	 */
	public function testDivideToOddNumber()
	{
	    // initialize a new Float instance
	    $float = new TechDivision_Lang_Float(11.00);
	    $float->divide(new TechDivision_Lang_Float(3.00));
        // check the value
	    $this->assertEquals(11.00 / 3.00, $float->floatValue());
	}
}