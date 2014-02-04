<?php

/*
 * Copyright (C) 2014 Mohamad Mohebifar <mohebifar.ir>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Mohebifar\CalendarBundle\Calendar;

use Mohebifar\CalendarBundle\Calendar\Calendar\ICalendar;

/**
 * A service to provide calendar drivers for symfony.
 *
 * @author Mohamad Mohebifar <mohebifar.ir>
 */
class Service
{

    /**
     * Driver for calendar
     * 
     * @var ICalendar
     */
    private $driver;

    public function __construct($driver)
    {
        $class = "Mohebifar\\CalendarBundle\\Calendar\\Calendar\\{$driver}";
        if(class_exists($class)) {
            $this->driver = new $class;
        } else {
            throw new Exception("$driver is not a calendar driver.");
        }
        
    }

    /**
     * Makes a date string
     * 
     * <pre>
     * <b> Day </b>
     * d: Day of month 01 to 31
     * D: A textual representation of a day
     * j: Day of the month without leading zeros 1 to 31
     * l: (lowercase 'L') A full textual representation of the day of the week
     * N: numeric representation of the day of the week 1 to 7
     * S: Persian Presentation for the day of the month
     * w: Numeric representation of the day of the week 0 to 6
     * z: The day of the year (starting from 0)
     * <b> Week </b>
     * W: week number of year
     * <b> Month </b>
     * F: A full textual representation of a month
     * m: Numeric representation of a month, with leading zeros 01 to 12
     * M: A short textual representation of a month
     * n: Numeric representation of a month, without leading zeros 1 to 12
     * <b> Year </b>
     * L: Whether it's a leap year, 1 if it is a leap year, 0 otherwise.
     * o: Year number. This has the same value as Y
     * Y: A full numeric representation of a year, 4 digits
     * y: A two digit representation of a year
     * <b> Time </b>
     * a | A: Ante meridiem and Post meridiem
     * g: 12-hour format of an hour without leading zeros 1 to 12
     * G: 24-hour format of an hour without leading zeros 1 to 23
     * h: 12-hour format of an hour with leading zeros 01 to 12
     * H: 24-hour format of an hour with leading zeros 01 to 23
     * i: Minutes with leading zeros
     * s: Seconds with leading zeros
     * </pre>
     * 
     * @param string $format
     * @param mixed $time
     * @return string
     */
    public function date($format, $time = null)
    {
        if ($time === null) {
            $time = time();
        }

        $this->driver->setDateTime($time);
        $this->driver->makeCalendarTime();
        return $this->driver->format($format);
    }

    /**
     * Makes a datetime from date details according to a calendar
     * 
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $month
     * @param int $day
     * @param int $year
     * @return \DateTime
     */
    public function mktime($hour, $minute, $second, $month, $day, $year)
    {
        $this->driver->getCalendarTime()->setHour($hour);
        $this->driver->getCalendarTime()->setMinute($minute);
        $this->driver->getCalendarTime()->setSecond($second);
        $this->driver->getCalendarTime()->setMonth($month);
        $this->driver->getCalendarTime()->setDay($day);
        $this->driver->getCalendarTime()->setYear($year);
        $this->driver->makeDateTime();

        return $this->driver->getDateTime();
    }
    
    /**
     * String to time
     * 
     * @param string $string
     */
    public function strtotime($string)
    {
        strtotime($string);
    }

}
