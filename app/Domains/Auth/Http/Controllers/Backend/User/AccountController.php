<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

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
    return view('backend.user.account', [
      'breadcrumbs' => $breadcrumbs
    ]);



    }
}
