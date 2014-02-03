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
 * Thrown when an application attempts to use <code>null</code> in a
 * case where an object is required. These include:
 * <ul>
 * <li>Calling the instance method of a <code>null</code> object.
 * <li>Accessing or modifying the field of a <code>null</code> object.
 * <li>Taking the length of <code>null</code> as if it were an array.
 * <li>Accessing or modifying the slots of <code>null</code> as if it
 *     were an array.
 * <li>Throwing <code>null</code> as if it were a <code>Throwable</code>
 *     value.
 * </ul>
 * <p>
 * Applications should throw instances of this class to indicate
 * other illegal uses of the <code>null</code> object.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_Exceptions_NullPointerException extends Exception
{
}