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

require_once "TechDivision/Lang/String.php";

/**
 * This is the test for the String class.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_StringTest extends PHPUnit_Framework_TestCase {

	/**
	 * This test checks the resolved class name.
	 *
	 * @return void
	 */
	public function testGetClass()
	{
		// check for the correct class name
		$this->assertEquals(
			'TechDivision_Lang_String',
		    TechDivision_Lang_String::__getClass()
		);
	}

	/**
	 * This test checks the String's equal method.
	 *
	 * @return void
	 */
	public function testEquals()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String('Mustermann');
		// check that the two Integers are equal
		$this->assertTrue(
		    $string->equals(
		        new TechDivision_Lang_String('Mustermann')
		    )
		);
	}

	/**
	 * This test checks the String's stringValue() method.
	 *
	 * @return void
	 */
	public function testStringValue()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String($test = 'Mustermann');
		// check that string value of the String instance
		$this->assertEquals($test, $string->stringValue());
	}

	/**
	 * This test checks the String's trim() method.
	 *
	 * @return void
	 */
	public function testTrim()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String(' Mustermann ');
		// check that String was trimmed successfully
		$this->assertTrue(
		    $string->trim()->equals(
		        new TechDivision_Lang_String('Mustermann')
		    )
		);
	}

	/**
	 * This test checks the String's md5() method.
	 *
	 * @return void
	 */
	public function testMd5()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String('Mustermann');
		// check that String's md5 summs equals
		$this->assertTrue(
		    $string->md5()->equals(
		        new TechDivision_Lang_String(
		            md5('Mustermann')
		        )
		    )
		);
	}

	/**
	 * This test checks the String's toUpperCase() method.
	 *
	 * @return void
	 */
	public function testToUpperCase()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String('mustermann1');
		// check that String was successfully convered to upper case
		$this->assertTrue(
		    $string->toUpperCase()->equals(
		        new TechDivision_Lang_String('MUSTERMANN1')
		    )
		);
	}

	/**
	 * This test checks the String's toLowerCase() method.
	 *
	 * @return void
	 */
	public function testToLowerCase()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String('MUSTERMANN1');
		// check that String was successfully convered to upper case
		$this->assertTrue(
		    $string->toLowerCase()->equals(
		        new TechDivision_Lang_String('mustermann1')
		    )
		);
	}

	/**
	 * This test checks the String's concat method.
	 *
	 * @return void
	 */
	public function testConcat()
	{
	    // initialize a new String instance
	    $string = new TechDivision_Lang_String('value to');
		// check that String was successfully concatenated
		$this->assertTrue(
		    $string->concat(new TechDivision_Lang_String(' search'))->equals(
		    	new TechDivision_Lang_String('value to search')
		    )
		);
	}

	/**
	 * This test checks the String's valueOf method.
	 *
	 * @return void
	 */
	public function testValueOf()
	{
	    // initialize a new String instance
	    $string = TechDivision_Lang_String::valueOf($value = 'value of');
		// check that String was successfully concatenated
		$this->assertTrue($string->equals(new TechDivision_Lang_String($string)));
	}
}