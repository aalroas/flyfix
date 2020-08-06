<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;

class SettingController extends Controller
{

     // Define Default Settings ID
    private $id = 1;
    private $uploadPath = "uploads/settings/";

    public function edit()
    {

    $breadcrumbs = [
      ['link' => "dashboard", 'name' => "Home"], ['name' => "Site Settings"]
    ];

        $id = $this->getId();
        $Setting = Setting::find($id)->first();
        if (!empty($Setting)) {
          return view('backend.setting',compact('Setting', 'breadcrumbs'));
        } else {
            return redirect()->route('admin.dashboard');
        }

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id = 1 for default settings
     * @return \Illuminate\Http\Response
     */
    public function updateSiteInfo(Request $request)
    {
        //
        $id = $this->getId();
        $Setting = Setting::find($id);
        if (!empty($Setting)) {

      // $slider = slider::where('id', $id)->update($request->except('_token', '_method', 'image'));
            $Setting->update($request->except('site_logo', 'site_icon'));
            // $Setting->site_title_en = $request->site_title_en;
            // $Setting->site_title_tr = $request->site_title_tr;
            // $Setting->site_title_ar = $request->site_title_ar;

            // $Setting->site_url = $request->site_url;
            // $Setting->site_email = $request->site_email;
            // $Setting->site_mobile = $request->site_mobile;
            // $Setting->site_phone = $request->site_phone;
            // $Setting->site_fax = $request->site_fax;

            // $Setting->site_whatsapp_url = $request->site_whatsapp_url;
            // $Setting->site_instagram_url = $request->site_instagram_url;
            // $Setting->site_facebook_url = $request->site_facebook_url;
            // $Setting->site_twitter_url = $request->site_twitter_url;
            // $Setting->site_linkedin_url = $request->site_linkedin_url;
            // $Setting->site_youtube_url = $request->site_youtube_url;


            // $Setting->site_meta_description_ar = $request->site_meta_description_ar;
            // $Setting->site_meta_description_en = $request->site_meta_description_en;
            // $Setting->site_meta_description_tr = $request->site_meta_description_tr;

            // $Setting->site_meta_keywords_en = $request->site_meta_keywords_en;
            // $Setting->site_meta_keywords_tr = $request->site_meta_keywords_tr;
            // $Setting->site_meta_keywords_ar = $request->site_meta_keywords_ar;

            // $Setting->copy_right_en = $request->copy_right_en;
            // $Setting->copy_right_tr = $request->copy_right_tr;
            // $Setting->copy_right_ar = $request->copy_right_ar;

            // $Setting->site_address_en = $request->site_address_en;
            // $Setting->site_address_tr = $request->site_address_tr;
            // $Setting->site_address_ar = $request->site_address_ar;


            // Start of Upload Files

            // logo icin
            $formFileName = "site_logo";
            $fileFinalName = "";
            if ($request->$formFileName != "") {
                // Delete a style_logo_en photo
                if ($Setting->site_logo != "") {
                       unlink($Setting->site_logo);
                }
                $fileFinalName = "uploads/settings/" . time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName);
            }



// icon icin
             $formIconFileName = "site_icon";
            $fileIconFinalName = "";
            if ($request->$formIconFileName != "") {
                // Delete a style_logo_en photo
                if ($Setting->site_icon != "") {
                   unlink($Setting->site_icon);
                }
                $fileIconFinalName = "uploads/settings/" . time() . rand(1111,
                        9999) . '.' . $request->file($formIconFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formIconFileName)->move($path, $fileIconFinalName);
            }

            // End of Upload Files
            if ($fileFinalName != "") {
                $Setting->site_logo = $fileFinalName;
            }

            if ($fileIconFinalName != "") {
                $Setting->site_icon = $fileIconFinalName;
            }

            $Setting->save();
           return redirect(route('admin.setting.edit'))->withFlashSuccess('Setting updated successfully');
        }
        else {
            return redirect()->route('admin.dashboard');
        }
    }



    // update tab of site status

    public function getUploadPath()
    {
        return $this->uploadPath;
    }


    // update tab of Style Settings

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}
