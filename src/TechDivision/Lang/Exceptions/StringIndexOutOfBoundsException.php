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

/**
 * Thrown to indicate that the application has attempted to convert
 * a string to one of the numeric types, but that the string does not
 * have the appropriate format.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_Exceptions_StringIndexOutOfBoundsException
    extends Exception {

    /**
     * Constructs a new <code>StringIndexOutOfBoundsException</code>
     * class with an argument indicating the illegal index.
     *
     * @param integer $index The illegal index
     */
	public static function forIndex($index)
	{
		throw new TechDivision_Lang_Exceptions_StringIndexOutOfBoundsException(
			'String index out of range: ' . $index
		);
	}
}