<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Carbon\Carbon;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        printf("Right now is %s", Carbon::now()->toDateTimeString());
        printf("Right now in Vancouver is %s", Carbon::now('America/Vancouver'));  //implicit __toString()
        $tomorrow = Carbon::now()->addDay();
        $lastWeek = Carbon::now()->subWeek();
        $nextSummerOlympics = Carbon::createFromDate(2012)->addYears(4);

        $officialDate = Carbon::now()->toRfc2822String();

        $howOldAmI = Carbon::createFromDate(1975, 5, 21)->age;

        $noonTodayLondonTime = Carbon::createFromTime(12, 0, 0, 'Europe/London');

        $timeThirtyOneOctober = mktime(0,0,0,10,31,2017);

        $date = new Carbon('Last Day of Last Month');
        //$date = new Carbon("Monday of Last Week");
        $date->setDate(2012, 02, 03);
        //$date = Carbon::createFromDate(2016, 10, 31);
        //Carbon::useMonthsOverflow(false);
        //$date->subMonth(1);
        var_dump($date);
        die;
        var_dump(
            $tomorrow,
            $lastWeek,
            $nextSummerOlympics,
            $officialDate,
            $howOldAmI,
            $noonTodayLondonTime
        );
        
        $worldWillEnd = Carbon::createFromDate(2012, 12, 21, 'GMT');

// Don't really want to die so mock now
        Carbon::setTestNow(Carbon::createFromDate(2000, 1, 1));

// comparisons are always done in UTC
        if (Carbon::now()->gte($worldWillEnd)) {
            die();
        }

// Phew! Return to normal behaviour
        Carbon::setTestNow();

        if (Carbon::now()->isWeekend()) {
            echo 'Party!';
        }
        echo Carbon::now()->subMinutes(2)->diffForHumans(); // '2 minutes ago'

// ... but also does 'from now', 'after' and 'before'
// rolling up to seconds, minutes, hours, days, months, years

        CarbonInterval::setLocale('fr');
        echo CarbonInterval::years(2)->minutes(2); // '2 ans 2 minutes'

        $daysSinceEpoch = Carbon::createFromTimestamp(0)->diffInDays();

        // return new ViewModel();
    }
}
