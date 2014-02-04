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
/**
 * Description of CalendarTime
 *
 * @author Mohamad Mohebifar <mohebifar.ir>
 */
class CalendarTime
{

    protected $second;
    protected $minute;
    protected $hour;
    protected $year;
    protected $day;
    protected $month;
    protected $dayOfYear;

    public function getSecond()
    {
        return $this->second;
    }

    public function getMinute()
    {
        return $this->minute;
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getDayOfYear()
    {
        return $this->dayOfYear;
    }

    public function setSecond($second)
    {
        $this->second = $second;
    }

    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function setDay($day)
    {
        $this->day = $day;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function setDayOfYear($dayOfYear)
    {
        $this->dayOfYear = $dayOfYear;
    }

}
