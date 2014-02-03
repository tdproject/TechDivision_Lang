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

require_once 'TechDivision/Lang/Object.php';
require_once 'TechDivision/Lang/Exceptions/StringIndexOutOfBoundsException.php';

/**
 * This class implements functionality to handle
 * a string value as object.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_String extends TechDivision_Lang_Object
{

	/**
	 * Holds the chars the String contains of.
	 * @var array
	 */
	protected $_value = '';

	/**
 	 * The length of the String.
 	 * @var integer
	 */
	protected $_length = 0;

	/**
 	 * The cached hash of the String itself.
 	 * @var integer
	 */
	protected $_hash = 0;

    /**
     * Initializes a newly created <code>String</code> object so that it
     * represents the same sequence of characters as the argument; in other
     * words, the newly created string is a copy of the argument string. Unless
     * an explicit copy of <code>value</code> is needed, use of this
     * constructor is unnecessary since Strings are immutable.
     *
     * @param mixed $value 	Holds the value to initialize the
     * 						String instance with
     * @return void
     */
	public function __construct($value = null)
	{
	    $this->_init($value);
	}

	/**
	 * Initializes the string and returns the
	 * instance.
	 *
	 * @param mixed $value The value to initialize the instance with
	 */
	protected function _init($value)
	{
		// check if a value was passed
		if (!is_null($value)) {
		    // if yes, cast and set it
			$this->_value = (string) $value;
			$this->_length = strlen($this->_value);
		}
        // return the instance
		return $this;
	}

	/**
	 * Initializes a new String instance with the passed value
	 * and returns it.
	 *
	 * @param mixed $value The value to initialize the String with
	 * @return TechDivision_Lang_String The initialized String instance
	 */
	public static function valueOf($value)
	{
	    return new TechDivision_Lang_String($value);
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
     * A copy of this object is returned.
     *
     * @return TechDivision_Lang_String A copy of the String itself.
     */
	public function toString()
	{
		return new TechDivision_Lang_String(
		    $this->stringValue()
		);
	}

	/**
	 * This returns the string value of
	 * the String itself.
	 *
	 * @return string Returns the string value of itself
	 */
	public function __toString()
	{
		return $this->stringValue();
	}

	/**
	 * Returns a new String, containing the concatenated value
	 * of the this string with the passed one.
	 *
	 * @param TechDivision_Lang_String $string
	 * 		The String to concatenate
	 * @return TechDivision_Lang_String
	 * 		The concatenated String
	 */
	public function concat(TechDivision_Lang_String $string)
	{
		return new TechDivision_Lang_String(
			$this->stringValue() . $string->stringValue()
		);
	}

    /**
     * Returns the length of this string.
     * The length is equal to the number of 16-bit
     * Unicode characters in the string.
     *
     * @return int 	The length of the sequence of characters represented
     * 				by this object.
     */
    public function length()
    {
        return $this->_length;
    }

	/**
	 * Returns the value as string.
	 *
	 * @return string The string value represented by this object
	 */
	public function stringValue()
	{
		return $this->_value;
	}

    /**
     * Returns a new string resulting from replacing all occurrences of
     * <code>oldChar</code> in this string with <code>newChar</code>.
     * <p>
     * If the character <code>oldChar</code> does not occur in the
     * character sequence represented by this <code>String</code> object,
     * then a reference to this <code>String</code> object is returned.
     * Otherwise, a new <code>String</code> object is created that
     * represents a character sequence identical to the character sequence
     * represented by this <code>String</code> object, except that every
     * occurrence of <code>oldChar</code> is replaced by an occurrence
     * of <code>newChar</code>.
     * <p>
     * Examples:
     * <blockquote><pre>
     * "mesquite in your cellar".replace('e', 'o')
     *         returns "mosquito in your collar"
     * "the war of baronets".replace('r', 'y')
     *         returns "the way of bayonets"
     * "sparring with a purple porpoise".replace('p', 't')
     *         returns "starring with a turtle tortoise"
     * "JonL".replace('q', 'x') returns "JonL" (no change)
     * </pre></blockquote>
     *
     * @param string oldChar The old character.
     * @param string newChar The new character.
     * @return String 	A string derived from this string by replacing every
     * 					occurrence of <code>oldChar</code> with
     * 					<code>newChar</code>
     */
    public function replace($oldChar, $newChar)
    {
		return new TechDivision_Lang_String(
		    str_replace($oldChar, $newChar, $this->stringValue())
		);
	}

	/**
	 * Returns true if the passed value is equal.
	 *
	 * @param TechDivision_Lang_Object $val The value to check
	 * @return boolean
	 */
	public function equals(TechDivision_Lang_Object $val)
	{
		return $this->stringValue() == $val->stringValue();
	}

    /**
     * Returns a new String that is a substring of this String. The
     * substring begins at the specified <code>beginIndex</code> and
     * extends to the character at index <code>endIndex - 1</code>.
     * Thus the length of the substring is <code>endIndex-beginIndex</code>.
     * <p>
     * Examples:
     * <blockquote><pre>
     * $hamburger = new String("hamburger");
     * $hamburger->substring(4, 8) returns "urge"
     * </pre></blockquote>
     *
     * @param      beginIndex   The beginning index, inclusive
     * @param      EndIndex     The ending index, exclusive.
     * @return     The specified substring.
     * @exception  StringIndexOutOfBoundsException  if the
     *             <code>beginIndex</code> is negative, or
     *             <code>endIndex</code> is larger than the length of
     *             this <code>String</code> object, or
     *             <code>beginIndex</code> is larger than
     *             <code>endIndex</code>.
     */
    public function substring($beginIndex, $endIndex)
    {
		if ($beginIndex < 0) {
    		TechDivision_Lang_Exceptions_StringIndexOutOfBoundsException::forIndex(
    		    $beginIndex
    		);
		}
		if ($endIndex > $this->length()) {
    		TechDivision_Lang_Exceptions_StringIndexOutOfBoundsException::forIndex(
    		    $endIndex
    		);
		}
		if ($beginIndex > $endIndex) {
    		TechDivision_Lang_Exceptions_StringIndexOutOfBoundsException::forIndex(
    		    $endIndex - $beginIndex
    		);
		}
		if (($beginIndex == 0) && ($endIndex == $this->length())) {
			return $this;
		}
		$value = substr($this->stringValue(), $beginIndex, $endIndex);
    	return new TechDivision_Lang_String($value);
	}

    /**
     * Returns a hash code for this string. The hash code for a
     * <code>String</code> object is computed as
     * <blockquote><pre>
     * s[0]*31^(n-1) + s[1]*31^(n-2) + ... + s[n-1]
     * </pre></blockquote>
     * using <code>int</code> arithmetic, where <code>s[i]</code> is the
     * <i>i</i>th character of the string, <code>n</code> is the length of
     * the string, and <code>^</code> indicates exponentiation.
     * (The hash value of the empty string is zero.)
     *
     * @return  a hash code value for this object.
     */
    public function hashCode()
    {
		$h = $this->_hash;
		if ($h == 0) {
		    $off = 0;
		    $len = $this->length();
            for ($i = 0; $i < $len; $i++) {
                $h = 31 * $h + $off++;
            }
            $this->_hash = $h;
        }
        return $h;
    }

    /**
     * Tells whether or not this string matches the
     * given regular expression.
     *
     * @param string $regex The regular expression to which this string is
     * 						to be matched
     * @return boolean 		TRUE if, and only if, this string matches the
     * 						given regular expression
     */
    public function matches($regex)
    {
		$isExisting = false;
		if (ereg($regex, $this->stringValue()) != false) {
			$isExisting = true;
		}
		return $isExisting;
    }

	/**
	 * This method has to be called to serialize the String.
	 *
	 * This method implements the abstract method from
	 * <code>Serializable::serialize()</code>.
	 *
	 * @return string Returns a serialized version of the String
	 * @see Serializable::serialize()
	 */
	public function serialize()
	{
		// serialize the object itself
		return serialize($this);
	}

	/**
	 * This method unserializes the passed string
	 * and initializes the String itself with the
	 * data.
	 *
	 * This method implements the abstract method from
	 * <code>Serializable::unserialize($serialized)</code>.
	 *
	 * @param string $serialized Holds the serialized object as a string
	 * @return void
	 * @see Serializable::unserialize($serialized)
	 */
	public function unserialize($serialized)
	{
		$this->_init(unserialize($serialized)->stringValue());
	}

	/**
	 * Splits this string around matches of the given regular expression.
	 *
	 * The array returned by this method contains each substring of this
	 * string that is terminated by another substring that matches the
	 * given expression or is terminated by the end of the string. The
	 * substrings in the array are in the order in which they occur in
	 * this string. If the expression does not match any part of the
	 * input then the resulting array has just one element, namely this
	 * string.
	 *
	 * The limit parameter controls the number of times the pattern is
	 * applied and therefore affects the length of the resulting array.
	 * If the limit n is greater than zero then the pattern will be applied
	 * at most n - 1 times, the array's length will be no greater than n,
	 * and the array's last entry will contain all input beyond the last
	 * matched delimiter. If n is non-positive then the pattern will be
	 * applied as many times as possible and the array can have any length.
	 * If n is zero then the pattern will be applied as many times as
	 * possible, the array can have any length, and trailing empty strings
	 * will be discarded.
	 *
	 * The string "boo:and:foo", for example, yields the following results
	 * with these parameters:
	 *
	 * Regex 	Limit 	Result
	 * : 		2 		{ "boo", "and:foo" }
	 * : 		5 		{ "boo", "and", "foo" }
	 * : 		-2 		{ "boo", "and", "foo" }
	 * o 		5 		{ "b", "", ":and:f", "", "" }
	 * o 		-2 		{ "b", "", ":and:f", "", "" }
	 * o 		0 		{ "b", "", ":and:f" }
	 *
	 * An invocation of this method of the form str.split(regex, n) yields the
	 * same result as the expression.
	 *
	 * @param string $regex The delimiting regular expression
	 * @param integer $limit The result threshold, as described above
	 * @return array 	The array of strings computed by splitting this string
	 * 					around matches of the given regular expression
	 */
	public function split($regex, $limit = -1)
	{
		// split the internal value into it's parts
		return preg_split(
		    $regex,
		    $this->stringValue(),
		    $limit,
		    PREG_SPLIT_NO_EMPTY
		);
	}

    /**
     * Returns a copy of the string, with leading and trailing whitespace
     * omitted.
     * <p>
     * If this <code>String</code> object represents an empty character
     * sequence, or the first and last characters of character sequence
     * represented by this <code>String</code> object both have codes
     * greater than <code>'&#92;u0020'</code> (the space character), then a
     * reference to this <code>String</code> object is returned.
     * <p>
     * Otherwise, if there is no character with a code greater than
     * <code>'&#92;u0020'</code> in the string, then a new
     * <code>String</code> object representing an empty string is created
     * and returned.
     * <p>
     * Otherwise, let <i>k</i> be the index of the first character in the
     * string whose code is greater than <code>'&#92;u0020'</code>, and let
     * <i>m</i> be the index of the last character in the string whose code
     * is greater than <code>'&#92;u0020'</code>. A new <code>String</code>
     * object is created, representing the substring of this string that
     * begins with the character at index <i>k</i> and ends with the
     * character at index <i>m</i>-that is, the result of
     * <code>this.substring(<i>k</i>,&nbsp;<i>m</i>+1)</code>.
     * <p>
     * This method may be used to trim
     * {@link Character#isSpace(char) whitespace} from the beginning and end
     * of a string; in fact, it trims all ASCII control characters as well.
     *
     * @return TechDivision_Lang_String 	A reference of this string with
     * 										leading and trailing white space
     * 										removed, or this string if it has no
     * 										leading or trailing white space.
     */
	public function trim()
	{
		return $this->_init(
		    trim($this->stringValue())
		);
	}

	/**
	 * md5 encryptes the string and returns the
	 * instance.
	 *
	 * @return TechDivion_Lang_String The instance md5 encrypted
	 */
	public function md5()
	{
	    return $this->_init(
	        md5($this->stringValue())
	    );
	}

	/**
	 * Converts the string value to upper case
	 * and returns the instance.
	 *
	 * @return TechDivion_Lang_String The instance
	 */
	public function toUpperCase()
	{
        return $this->_init(
            strtoupper($this->stringValue())
        );
	}

	/**
	 * Converts the string value to lower case
	 * and returns the instance.
	 *
	 * @return TechDivion_Lang_String The instance
	 */
	public function toLowerCase()
	{
	    return $this->_init(
	        strtolower($this->stringValue())
	    );
	}
}