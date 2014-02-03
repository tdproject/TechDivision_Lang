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

// set the include path necessary for running the tests
set_include_path(
	get_include_path() . PATH_SEPARATOR
	. getcwd() . PATH_SEPARATOR
	. '${pear.dir}/pear/php' . PATH_SEPARATOR
	. 'lib'
);

require_once 'TechDivision/XHProfPHPUnit/TestSuite.php';
require_once 'TechDivision/Lang/ObjectTest.php';
require_once 'TechDivision/Lang/IntegerTest.php';
require_once 'TechDivision/Lang/StringTest.php';
require_once 'TechDivision/Lang/BooleanTest.php';
require_once 'TechDivision/Lang/FloatTest.php';
require_once 'TechDivision/Lang/ThreadTest.php';

/**
 * The TestSuite that initializes all PHPUnit tests.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_AllTests
{

    /**
     * Initializes the TestSuite.
     *
     * @return TechDivision_XHProfPHPUnit_TestSuite The initialized TestSuite
     */
    public static function suite()
    {
        // initialize the TestSuite
        $suite = new TechDivision_XHProfPHPUnit_TestSuite(
        	'${ant.project.name}',
        	'',
            '${release.version}'
        );
        // add a test
        $suite->addTestSuite('TechDivision_Lang_ObjectTest');
        $suite->addTestSuite('TechDivision_Lang_IntegerTest');
        $suite->addTestSuite('TechDivision_Lang_StringTest');
        $suite->addTestSuite('TechDivision_Lang_BooleanTest');
        $suite->addTestSuite('TechDivision_Lang_FloatTest');
        $suite->addTestSuite('TechDivision_Lang_ThreadTest');
        // return the TestSuite itself
        return $suite;
    }
}