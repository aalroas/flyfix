<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    $breadcrumbs = [
      ['link' => "/account", 'name' => "Account"], ['name' => "Account Settings"]
    ];
    return view('frontend.user.account', [
      'breadcrumbs' => $breadcrumbs
    ]);



    }
}
