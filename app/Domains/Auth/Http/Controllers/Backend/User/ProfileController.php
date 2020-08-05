<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\UserPreferences;
use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{


    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {

    $userImage =   User::find(Auth::User()->id);
    if ($request->hasFile('image')) {
      // Delete a style_logo_en photo
      if ($userImage->image != "") {
        unlink($userImage->image);
      }
      $fileNameWithExt = $request->file('image')->getClientOriginalName();
      // get file name
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('image')->getClientOriginalExtension();

      $fileNameToStore =  'uploads/users/' . time() . '.' . $extension;
      // upload
      $path = $request->file('image')->move('uploads/users/', $fileNameToStore);
      $userImage->image = $fileNameToStore;
      $userImage->save();
    }
      $userService->updateProfile($request->user(), $request->validated());

      if (session()->has('resent')) {
          return redirect()->route('backend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
      }
      return  redirect()->route('admin.auth.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }







}
