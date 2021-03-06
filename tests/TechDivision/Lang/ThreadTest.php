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

require_once "TechDivision/Lang/Thread.php";
require_once "TechDivision/Lang/Mock/Runnable.php";

/**
 * This is the test for the String class.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_ThreadTest extends PHPUnit_Framework_TestCase
{

	/**
	 * This test checks that the runnable is returned.
	 *
	 * @return void
	 */
	public function testGetRunnable()
	{
	    // initialize the thread
	    $r1 = new TechDivision_Lang_Mock_Runnable();	    
        $t1 = new TechDivision_Lang_Thread($r1);
        // assert that the runnable is returned
        $this->assertSame($r1, $t1->getRunnable());
	}
}