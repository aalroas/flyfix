<?php

namespace App\Domains\Auth\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
Use Analytics;
Use Spatie\Analytics\Period;


/**
 * Class UserController.
 */
class GoogleAnalyticsController extends Controller
{


  /**
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $fetchTopBrowsers = Analytics::fetchTopBrowsers(Period::years(1), 20);


  }

}
