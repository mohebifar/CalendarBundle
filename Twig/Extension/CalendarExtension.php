<?php

namespace Mohebifar\CalendarBundle\Twig\Extension;

use Mohebifar\CalendarBundle\Calendar\Service;
use Twig_Extension;
use Twig_Filter_Method;

/**
 * @author Mohamad Mohebifar <netfars@gmail.com>
 */
class CalendarExtension extends Twig_Extension
{

    private $service;

    /**
     * 
     * @param type $twig
     * @param Service $service
     */
    public function __construct($twig, Service $service)
    {
        $this->service = $service;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'date_filter' => new Twig_Filter_Method($this, 'dateFilter'),
        );
    }

    public function dateFilter($time, $format)
    {
        return $this->service->date($format, $time);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'date';
    }

}
