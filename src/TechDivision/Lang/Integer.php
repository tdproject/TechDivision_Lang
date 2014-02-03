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

require_once "TechDivision/Lang/Number.php";
require_once "TechDivision/Lang/String.php";
require_once "TechDivision/Lang/Exceptions/NumberFormatException.php";

/**
 * This class implements functionality to handle
 * a integer value as object.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_Integer extends TechDivision_Lang_Number
{

	/**
 	 * The value of the Integer.
	 */
	protected $_value = null;

    /**
     * Constructs a newly allocated <code>Integer</code> object that
     * represents the primitive <code>integer</code> argument.
     *
     * @param integer $value 	The value to be represented by the
     * 							<code>Integer</code>.
     * @throws TechDivision_Lang_Exceptions_NumberFormatException
     * 		Is thrown if the passed value is not an integer
     */
	public function __construct($value)
	{
		if( !is_integer($value)) {
			TechDivision_Lang_Exceptions_NumberFormatException::forInputString(
			    $value
			);
		}
		$this->_value = $value;
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
 	 * Returns a <code>Integer</code> object holding the
 	 * <code>float</code> value represented by the argument string
 	 * <code>s</code>.
     * <p>
     * If <code>s</code> is <code>null</code>, then a
     * <code>NullPointerException</code> is thrown.
     * <p>
     * Leading and trailing whitespace characters in <code>s</code>
     * are ignored. The rest of <code>s</code> should constitute a
     * <i>Integer</i> as described by the lexical syntax rules:
     * <blockquote><i>
     * <dl>
     * <dt>Integer:
     * <dd><i>Sign<sub>opt</sub></i> <code>NaN</code>
     * <dd><i>Sign<sub>opt</sub></i> <code>Infinity</code>
     * <dd>Sign<sub>opt</sub> FloatingPointLiteral
     * </dl>
     * </i></blockquote>
     * where <i>Sign</i> and <i>FloatingPointLiteral</i> are as
     * defined in <a href="http://java.sun.com/docs/books/jls/second_edition/
     * html/lexical.doc.html#230798">&sect;3.10.2</a>
     * of the <a href="http://java.sun.com/docs/books/jls/html/">Java
     * Language Specification</a>. If <code>s</code> does not have the
     * form of a <i>Integer</i>, then a
     * <code>NumberFormatException</code> is thrown. Otherwise,
     * <code>s</code> is regarded as representing an exact decimal
     * value in the usual "computerized scientific notation"; this
     * exact decimal value is then conceptually converted to an
     * "infinitely precise" binary value that is then rounded to type
     * <code>float</code> by the usual round-to-nearest rule of IEEE
     * 754 floating-point arithmetic, which includes preserving the
     * sign of a zero value.  Finally, a <code>Float</code> object
     * representing this <code>float</code> value is returned.
     * <p>
     * To interpret localized string representations of a
     * floating-point value, use subclasses of {@link
     * java.text.NumberFormat}.
     *
     * <p>Note that trailing format specifiers, specifiers that
     * determine the type of a floating-point literal
     * (<code>1.0f</code> is a <code>float</code> value;
     * <code>1.0d</code> is a <code>double</code> value), do
     * <em>not</em> influence the results of this method.  In other
     * words, the numerical value of the input string is converted
     * directly to the target floating-point type.  In general, the
     * two-step sequence of conversions, string to <code>double</code>
     * followed by <code>double</code> to <code>float</code>, is
     * <em>not</em> equivalent to converting a string directly to
     * <code>float</code>.  For example, if first converted to an
     * intermediate <code>double</code> and then to
     * <code>float</code>, the string<br>
     * <code>"1.00000017881393421514957253748434595763683319091796875001d"
     * </code><br> results in the <code>float</code> value
     * <code>1.0000002f</code>; if the string is converted directly to
     * <code>float</code>, <code>1.000000<b>1</b>f</code> results.
     *
     * @param TechDivision_Lang_String $string The string to be parsed.
     * @return TechDivision_Lang_Integer 	A <code>Integer</code> object holding
     * 									 	the value represented by the <code>
     * 										String</code> argument.
     * @exception TechDivision_Lang_Exceptions_NumberFormatException
     * 		If the string does not contain a parsable number.
 	 */
	public static function valueOf(TechDivision_Lang_String $string)
	{
		if (!preg_match("/([0-9-]+)/", $string->stringValue())) {
			TechDivision_Lang_Exceptions_NumberFormatException::forInputString(
			    $string->stringValue()
			);
		}
		if (!is_numeric($string->stringValue())) {
			TechDivision_Lang_Exceptions_NumberFormatException::forInputString(
			    $string->stringValue()
			);
		}
		return new TechDivision_Lang_Integer((integer) $string->stringValue());
	}

    /**
     * Returns a new <code>Integer</code> initialized to the value
     * represented by the specified <code>String</code>, as performed
     * by the <code>valueOf</code> method of class <code>Integer</code>.
     *
     * @param TechDivision_Lang_String $string She string to be parsed.
     * @return TechDivision_Lang_Integer 	The <code>Integer</code> value
     * 										represented by the string argument.
     * @exception TechDivision_Lang_Exceptions_NumberFormatException
     * 		If the string does not contain a  parsable <code>Integer</code>.
     * @see TechDivision_Lang_Integer::valueOf($string)
     */
	public static function parseInteger(TechDivision_Lang_String $string)
	{
		return TechDivision_Lang_Integer::valueOf($string)->intValue();
	}

	/**
	 * @see TechDivision_Lang_Number::floatValue()
	 */
	public function floatValue()
	{
		return (float) $this->_value;
	}

	/**
	 * @see TechDivision_Lang_Number::intValue()
	 */
	public function intValue()
	{
		return $this->_value;
	}

	/**
	 * @see TechDivision_Lang_Number::doubleValue()
	 */
	public function doubleValue()
	{
		return (double) $this->_value;
	}

    /**
     * This object as String returned.
     *
     * @return TechDivision_Lang_String The value as String.
     */
	public function toString()
	{
		return new TechDivision_Lang_String($this->_value);
	}

	/**
	 * (non-PHPdoc)
	 * @see TechDivision_Lang_Object#__toString()
	 */
	public function __toString()
	{
		$string = new TechDivision_Lang_String($this->_value);
		return $string->stringValue();
	}

	/**
	 * Returns true if the passed value is equal.
	 *
	 * @param TechDivision_Lang_Object $val The value to check
	 * @return boolean
	 */
	public function equals(TechDivision_Lang_Object $val)
	{
	    if ($val instanceof TechDivision_Lang_Integer) {
		    return $this->intValue() == $val->intValue();
	    }
	    return false;
	}

	/**
	 * Adds the value of the passed Integer.
	 *
	 * @param TechDivision_Lang_Integer $toAdd The Integer to add
	 * @return TechDivision_Lang_Integer The instance
	 */
	public function add(TechDivision_Lang_Integer $toAdd)
	{
	    $this->_value += $toAdd->intValue();
	    return $this;
	}

	/**
	 * Subtracts the value of the passed Integer.
	 *
	 * @param TechDivision_Lang_Integer $toSubtract The integer to subtract
	 * @return TechDivision_Lang_Integer The instance
	 */
	public function subtract(TechDivision_Lang_Integer $toSubtract)
	{
	    $this->_value -= $toSubtract->intValue();
	    return $this;
	}
	
	/**
	 * Multiplies the Integer with the passed one.
	 * 
	 * @param TechDivision_Lang_Integer $toMultiply The Integer to multiply
	 * @return TechDivision_Lang_Integer The instance
	 */
	public function multiply(TechDivision_Lang_Integer $toMultiply)
	{
		$this->_value *= $toMultiply->intValue();
		return $this;
	}
	
	/**
	 * Divides the Integer by the passed one. As this is an Integer
	 * the result will ALWAYS be casted to an Integer agains, what
	 * means that everything after the decimal point will be cutted
	 * of!
	 * 
	 * @param TechDivision_Lang_Integer $dividyBy The Integer to dividy by
	 * @return TechDivision_Lang_Integer The instance
	 */
	public function divide(TechDivision_Lang_Integer $dividyBy)
	{
		$this->_value = intval(($this->_value / $dividyBy->intValue()));
		return $this;
	}
	
	/**
	 * The methods returns the remainder of division of objects value 
	 * by the passed divisor.
	 * 
	 * @return TechDivision_Lang_Integer The remainder of the modulo operation
	 */
	public function modulo(TechDivision_Lang_Integer $divisor)
	{
		return new TechDivision_Lang_Integer(
			$this->_value % $divisor->intValue()
		);
	}
	
	/**
	 * Returns TRUE if the object's value is greater than the passed one.
	 * 
	 * @param TechDivision_Lang_Integer $val 
	 * 		The value to test the object's value against
	 * @boolean TRUE if the object's value is greater
	 */
	public function greaterThan(TechDivision_Lang_Integer $val)
	{
		return $this->_value > $val->intValue();
	}
	
	/**
	 * Returns TRUE if the object's value is greater or equal than 
	 * the passed one.
	 * 
	 * @param TechDivision_Lang_Integer $val 
	 * 		The value to test the object's value against
	 * @boolean TRUE if the object's value is greater or equal
	 */
	public function greaterThanOrEqual(TechDivision_Lang_Integer $val)
	{
		return $this->_value >= $val->intValue();
	}
	
	/**
	 * Returns TRUE if the object's value is lower than the passed one.
	 * 
	 * @param TechDivision_Lang_Integer $val 
	 * 		The value to test the object's value against
	 * @boolean TRUE if the object's value is lower
	 */
	public function lowerThan(TechDivision_Lang_Integer $val)
	{
		return $this->_value < $val->intValue();
	}
	
	/**
	 * Returns TRUE if the object's value is lower or equal than 
	 * the passed one.
	 * 
	 * @param TechDivision_Lang_Integer $val 
	 * 		The value to test the object's value against
	 * @boolean TRUE if the object's value is lower or equal
	 */
	public function lowerThanOrEqual(TechDivision_Lang_Integer $val)
	{
		return $this->_value <= $val->intValue();
	}
}