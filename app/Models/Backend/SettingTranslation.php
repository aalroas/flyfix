<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
class SettingTranslation  extends Model
{

  public $timestamps = false;
  protected $fillable = [
  'site_title',
  'site_address',
  'site_meta_description',
  'site_meta_keywords',
  'copy_right',
    ];
}
