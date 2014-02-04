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

use Mohebifar\CalendarBundle\Calendar\Calendar\ICalendar;
use Mohebifar\CalendarBundle\Calendar\CalendarTime;
use Symfony\Component\Serializer\Exception\Exception;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Description of AbstractCalendar
 *
 * @author Mohamad Mohebifar <mohebifar.ir>
 */
abstract class AbstractCalendar implements ICalendar
{
    /**
     * CalendarTime result
     * 
     * @var CalendarTime 
     */
    protected $calendarTime;

    /**
     * DateTime result
     * 
     * @var DateTime
     */
    protected $datetime;
    
    public static function prepareDateTime($dateTime)
    {
        if ($dateTime instanceof \DateTime) {
            return $dateTime;
        } elseif (is_numeric($dateTime)) {
            $object = new \DateTime();
            $object->setTimestamp($dateTime);
            return $object;
        } else {
            throw new Exception("The given datetime is not a valid type of value. Given type :" . gettype($dateTime));
        }
    }

    public function setDateTime($dateTime)
    {
        $this->datetime = self::prepareDateTime($dateTime);
        return $this->datetime;
    }
    
    public function setCalendarTime($calendarTime)
    {
        if($calendarTime instanceof CalendarTime) {
            $this->calendarTime = $calendarTime;
        } elseif(is_string($dateTime)) {
            $this->calendarTime = $this->stringToTime($dateTime);
        } else {
            throw new Exception("Calendar time must be instance of \Mohebifar\CalendarBundle\Calendar\CalendarTime. Given type :" . gettype($calendarTime));
        }
    }
    
    public function getCalendarTime()
    {
        return $this->calendarTime;
    }

    public function getDateTime()
    {
        return $this->datetime;
    }
}
