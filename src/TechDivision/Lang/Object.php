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
 * This class is the abstract class of all other classes.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
abstract class TechDivision_Lang_Object
{

	/**
	 * This method returns the class as
	 * a string representation.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return get_class($this) . "@" . sha1(serialize($this));
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
	 * This method checks if the passed object is equal
	 * to itself.
	 *
	 * @param TechDivision_Lang_Object $obj The object to check
	 * @return boolean Returns TRUE if the passed object is equal
	 */
	public function equals(TechDivision_Lang_Object $obj)
	{
		if ($obj === $this) {
			return true;
		}
		return false;
	}
}