<?php

namespace App\Models\Backend;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;
class Setting extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = [
      'site_icon',
      'site_logo',
      'site_url',
      'site_email',
      'site_mobile',
      'site_phone',
      'site_fax',
      'site_whatsapp_url',
      'site_instagram_url',
      'site_facebook_url',
      'site_twitter_url',
      'site_linkedin_url',
      'site_youtube_url'
      ];
    public $translatedAttributes = [
      'site_title',
      'site_address',
      'site_meta_description',
      'site_meta_keywords',
      'copy_right',
      ];


}
