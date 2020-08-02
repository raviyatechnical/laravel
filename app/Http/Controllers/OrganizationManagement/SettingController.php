<?php

namespace App\Http\Controllers\OrganizationManagement;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SettingController extends Controller
{

    public function getEnv($value='')
    {
    	if (Config::get('app.env') == 'demo') {
            $env = File::get(base_path('env.example'));
        } else {
            $env = File::get(base_path('.env'));
        }
        return view('setting.env',compact('env'));
    }

    public function saveEnv(Request $request)
    {
    	//dd($request->env);exit;
    	$env = $request->env;

        file_put_contents(base_path('.env'), $env);
        return redirect()->back()->with('success','Env Update successfully');
    }

    public function generalSettings($value='')
    {
        $settings = Setting::get();
    	// Setting::get('title_seperator')
    	// Setting::get('site_title')
    	// Setting::get('title_seperator')
    	// Setting::get('site_tagline')

    	return view('setting.general-settings',compact('settings'));	
    }

    public function updateGeneralSettings(Request $request)
    {
    	$settings = $request->except('_token');
    	if ($request->mail_verification == 'on') {
            if ((env('MAIL_DRIVER') == "" || (env('MAIL_DRIVER') == null)) ||
              ((env('MAIL_HOST') == "" || env('MAIL_HOST') == null)) ||
              ((env('MAIL_PORT') == "" || env('MAIL_PORT') == null)) ||
              ((env('MAIL_USERNAME') == "" || env('MAIL_USERNAME') == null)) ||
              ((env('MAIL_PASSWORD') == "" || env('MAIL_PASSWORD') == null)) ||
              ((env('MAIL_ENCRYPTION') == "" || env('MAIL_ENCRYPTION') == null))) {
                $messages = trans('admin.email_not_configured');
                return redirect()->back()->with('messages', $messages);
            }
        }
        if ($request->captcha == 'on') {
            if (env('NOCAPTCHA_SECRET') == "" || (env('NOCAPTCHA_SECRET') == null) && (env('NOCAPTCHA_SITEKEY') == "") ||
                env('NOCAPTCHA_SITEKEY') == null) {
                $messages = trans('admin.captcha_not_configured');
                return redirect()->back()->with('messages', $messages);
            }
        }
        $change_logo = $request->file('logo');
        if ($change_logo) {
            $photoName = 'logo.jpg';
            $logo = Image::make($change_logo->getRealPath());

            $logo->save(storage_path().'/uploads/settings/'.$photoName, 60);
            $settings['logo'] = $photoName;
        }
        $change_favicon = $request->file('favicon');
        if ($change_favicon) {
            $photoName = 'favicon.jpg';
            $favicon = Image::make($change_favicon->getRealPath());

            $favicon->save(storage_path().'/uploads/settings/'.$photoName, 60);
            $settings['favicon'] = $photoName;
        }
        Setting::set($settings);
        $language_options = ['' => 'Select Language'] + Config::get('app.locales');

        return redirect()->back()->with('success','General Settings updated successfully');

    }

    public function getUpdateDatabase(Request $request)
    {
    	$migrations = DB::table('migrations')->select('migration')->get();
    	$files = array_map('basename', File::allFiles(base_path('database/migrations')));
        $count = 0;
        if (count($migrations) < count($files)) {
            $count = count($files) - count($migrations);
        }


        Artisan::call('migrate:status');
        $output = Artisan::output();
     	return view('setting.env',compact('output','count'));   
    }
}
