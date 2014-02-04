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

namespace Mohebifar\CalendarBundle\Calendar\Calendar;

/**
 * Description of Gregorian
 *
 * @author Mohamad Mohebifar <mohebifar.ir>
 */
class Gregorian extends AbstractCalendar
{

    public function format($format)
    {
        return date($format, $this->datetime->getTimestamp());
    }

    public function makeCalendarTime()
    {
        
    }

    public function makeDateTime()
    {
        list($hour, $minute, $second, $month, $day, $year) = array(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
        
        if (! is_null($this->calendarTime->getHour())) {
            $hour = $this->calendarTime->getHour();
        }
        
        if (! is_null($this->calendarTime->getMinute())) {
            $minute = $this->calendarTime->getMinute();
        }
        
        if (! is_null($this->calendarTime->getSecond())) {
            $second = $this->calendarTime->getSecond();
        }
        
        if (! is_null($this->calendarTime->getMonth())) {
            $month = $this->calendarTime->getMonth();
        }
        
        if (! is_null($this->calendarTime->getDay())) {
            $day = $this->calendarTime->getDay();
        }
        
        if (! is_null($this->calendarTime->getYear())) {
            $year = $this->calendarTime->getYear();
        }


        $time = mktime($hour, $minute, $second, $month, $day, $year);
        $this->datetime->setTimestamp($time);
        return $this;
    }

}
