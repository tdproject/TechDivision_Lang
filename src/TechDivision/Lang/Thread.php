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

/**
 * This is an implementation of a php thread.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class TechDivision_Lang_Thread extends TechDivision_Lang_Object 
{
    
    const FUNCTION_NOT_CALLABLE     = 10;
    const COULD_NOT_FORK            = 15;
    
    /**
     * possible errors
     *
     * @var array
     */
    private $errors = array(
        TechDivision_Lang_Thread::FUNCTION_NOT_CALLABLE   => 'You must specify a valid function name that can be called from the current scope.',
        TechDivision_Lang_Thread::COULD_NOT_FORK          => 'pcntl_fork() returned a status of -1. No new process was created',
    );
    
    /**
     * callback for the function that should
     * run as a separate thread
     *
     * @var callback
     */
    protected $_runnable;
    
    /**
     * holds the current process id
     *
     * @var integer
     */
    private $_pid;
    
    /**
     * checks if threading is supported by the current
     * PHP configuration
     *
     * @return boolean
     */
    public static function available()
    {
        $required_functions = array(
            'pcntl_fork',
        );
        
        foreach($required_functions as $function) {
            if (!function_exists($function)) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * class constructor - you can pass
     * the callback function as an argument
     *
     * @param TechDivision_Lang_Interfaces_Runnable $runnable
     */
    public function __construct(TechDivision_Lang_Interfaces_Runnable $runnable)
    {
        $this->setRunnable($runnable);
    }
    
    /**
     * Sets the runnable implementation
     *
     * @param TechDivision_Lang_Interfaces_Runnable $runnable
     * @return TechDivision_Lang_Interfaces_Runnable
     */
    public function setRunnable(TechDivision_Lang_Interfaces_Runnable $runnable)
    {
        $this->_runnable = $runnable;
    }
    
    /**
     * Gets the runnable implementation
     *
     * @return TechDivision_Lang_Interfaces_Runnable
     */
    public function getRunnable()
    {
        return $this->_runnable;
    }
    
    /**
     * returns the process id (pid) of the simulated thread
     * 
     * @return int
     */
    public function getPid()
    {
        return $this->_pid;
    }
    
    /**
     * checks if the child thread is alive
     *
     * @return boolean
     */
    public function isAlive()
    {
        $pid = pcntl_waitpid($this->_pid, $status, WNOHANG);
        return $pid === 0;
        
    }
    
    /**
     * starts the thread, all the parameters are 
     * passed to the callback function
     * 
     * @return void
     */
    public function start()
    {
        $pid = @pcntl_fork();
        
        if ($pid == -1) {
            throw new Exception($this->getError(TechDivision_Lang_Thread::COULD_NOT_FORK), TechDivision_Lang_Thread::COULD_NOT_FORK);
        }
        if ($pid) {
            // parent 
            $this->_pid = $pid;
        }
        else {
            // child
            pcntl_signal(SIGTERM, array($this, '_signalHandler'));
            $this->_runnable->run();
            exit(0);
        }
    }
    
    /**
     * attempts to stop the thread
     * returns true on success and false otherwise
     *
     * @param integer $signal - SIGKILL/SIGTERM
     * @param boolean $wait
     */
    public function stop($_signal = SIGKILL, $wait = false)
    {
        if ($this->isAlive()) {
            posix_kill($this->_pid, $signal);
            if ($wait) {
                pcntl_waitpid($this->_pid, $status = 0);
            }
        }
    }
    
    /**
     * alias of stop();
     *
     * @return boolean
     */
    public function kill($signal = SIGKILL, $wait = false)
    {
        return $this->stop($signal, $wait);
    }
    
    /**
     * gets the error's message based on
     * its id
     *
     * @param integer $code
     * @return string
     */
    public function getError($code)
    {
        if (isset($this->errors[$code])) {
            return $this->errors[$code];
        } else {
            return 'No such error code ' . $code . '! Quit inventing errors!!!';
        }
    }
    
    /**
     * signal handler
     *
     * @param integer $signal
     */
    protected function _signalHandler($signal)
    {
        switch ($signal) {
            case SIGTERM:
                exit(0);
            break;
        }
    }
}