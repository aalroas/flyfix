<?php

namespace App\Http\Controllers\Backend;

use Spatie\Analytics\Period;
use Analytics;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $pageConfigs = [
            'pageHeader' => false
        ];
        return view('backend.pages.dashboard-analytics', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index2()
    {
    $fetchTopBrowsers = Analytics::fetchTopBrowsers(Period::years(1), 5);
    $user_types = Analytics::fetchUserTypes(Period::years(1));
      $pageConfigs = [
            'pageHeader' => false
        ];
        return view('backend.pages.dashboard-ecommerce', [
            'pageConfigs' => $pageConfigs,
            'top_browsers' =>      collect($fetchTopBrowsers)->toJson(),
            'user_types' =>      collect($user_types)->toJson()

        ]);
    }




}
