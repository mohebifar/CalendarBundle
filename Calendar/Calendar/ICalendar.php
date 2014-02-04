<?php

/*
 * Mohebifar Calendar Telephony Bundle All Rights Reserved 2014
 * Programmer : Mohamad Mohebifar
 */
namespace Mohebifar\CalendarBundle\Calendar\Calendar;

/**
 *
 * @author Mohamad Mohebifar <mohebifar.ir>
 */
interface ICalendar
{
    public function setDateTime($dateTime);
    public function getDateTime();
    public function makeDateTime();
    
    public function setCalendarTime($calendarTime);
    /**
     * @return \Mohebifar\CalendarBundle\Calendar\CalendarTime
     */
    public function getCalendarTime();
    public function makeCalendarTime();
    
    public function format($format);
}
