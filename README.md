CalendarBundle is a Symfony2 bundle which helps you to show Datetimes based on a calendar. CalendarBundle uses a strategy that allows you to make your arbitary driver.

Currently drivers are :

 1. Gregorian
 2. Persian (also known as Hejri Khorshidi, Hijri Shamsi (Persian: هجری شمسی, هجری خورشیدی). It is official calendar in Iran)

Installation
============
You can install this bundle using composer :

    require: {
        ...,
		"mohebifar/calendar-bundle": "dev-master"
	}
	
Then update :

    composer update

Also you can install it using git :

    git clone https://github.com/mohebifar/CalendarBundle.git

After getting package, you have to include that. Edit `app/AppKernel.php` and add this line in `registerBundles` function :

    $bundles[] = new Mohebifar\CalendarBundle\MohebifarCalendarBundle();

Configuration
=============

Edit *app/config/parameters.yml* as following :

    parameters:
        ...
        calendar: Persian
        
And now your calendar service uses persian driver.

Use
===

You can access calendar service in controller :

    class TestController extends Controller
    {

        public function indexAction()
        {
            $calendar = $this->get("mohebifar.calendar");
            ...
        }
        
    }

Formats
-------

    $calendar->date("Y/n/j");

Persian Result : `1392/8/15`
Gregorian Result : `2013/11/6`

    $calendar->date("l jS F Y H:i:s");

Persian Result : `چهارشنبه پانزدهم آبان 1392 11:20:00` 
Gregorian Resilt: `Wednsday 16th November 2013 11:20:00`


Timezone
-------
You can set Timezones by one of the following methods :

1. Set timezone as default :

        date_default_timezone_set("Asia/Tehran");
        

2. Set it on DateTime object :

        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('Pacific/Nauru'));
        $calendar->setDateTime($date);

Twig Extension
=======
Twig filter is available for this bundle. If you want to print out some timestamp or DateTime object, you can use `date_filter` in twig. for example :

    <span class="date">{{ post.date|date_filter('Y-m-d H:i:s') }}</span>