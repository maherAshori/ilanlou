<?php
namespace App\View\Cell;

use Cake\View\Cell;
use App\Utility\DateConvertor;

/**
 * ConvertDate cell
 */
class ConvertDateCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    public function month($month){
        switch ($month){
            case 1:
                return 'فروردین';
            case 2:
                return 'اردیبهشت';
            case 3:
                return 'خرداد';
            case 4:
                return 'تیر';
            case 5:
                return 'مرداد';
            case 6:
                return 'شهریور';
            case 7:
                return 'مهر';
            case 8:
                return 'آبان';
            case 9:
                return 'آذر';
            case 10:
                return 'دی';
            case 11:
                return 'بهمن';
            case 12:
                return 'اسفند';
        }
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($date, $output = null)
    {
        $dateConvertor = new DateConvertor();

        $addTime = $date->i18nFormat('yyyy-MM-dd HH:mm:ss');
        $array = explode(' ', $addTime);
        list($year, $month, $day) = explode('-', $array[0]);
        $newDate = $dateConvertor->gregorian_to_jalali($year, $month, $day, "/");

        if(!empty($output)){
            $pdate = explode("/", $newDate);
            switch ($output){
                case 'd':
                    $newDate = $pdate[2];
                    break;
                case 'm':
                    $newDate = $this->month($pdate[1]);
                    break;
                case 'y':
                    $newDate = $pdate[0];
                    break;
            }
        }

        $this->set('date', $newDate);
    }
}
