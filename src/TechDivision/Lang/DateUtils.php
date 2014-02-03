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

/**
 * This class provides several methods for date
 * handling.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_DateUtils extends TechDivision_Lang_Object
{

	/**
	 * Private constructor to mark this class
	 * as a util class.
	 *
	 * @return void
	 */
	private function __construct()
	{
		/* Marks this class as an util */
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
	 * This method returns a timestamp with the
	 * date passed as string.
	 *
	 * Possible date formats are 'dd mm YYYY'
	 * and 'dd.mm.YYYY', the default format is
	 * 'dd mm YYYY'.
	 *
	 * @param $string Holds the date as string to make the timestamp from
	 * @param $format Holds the format of the passed date
	 * @return timestamp Holds a timestamp representation of the passed string
	 */
	public static function fromString($string, $format = "dd mm YYYY")
	{
		if ($format == "dd mm YYYY") {
			$date = explode(" ", $string, 10);
			return strtotime("$date[2]-$date[1]-$date[0]");
		}
		if ($format == "dd.mm.YYYY") {
			$date = explode(".", $string, 10);
			return strtotime("$date[2]-$date[1]-$date[0]");
		}
	}

}