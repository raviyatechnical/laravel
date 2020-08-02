<?php

use App\Model\Setting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$settings = [
		'site_name'                   => 'Bhargav Raviya',
		'site_title'                  => 'Bhargav Raviya',
		'site_url'                    => 'localhost/laravel/public/',
		'support_email'               => 'admin@rajtechnologies.com',
		'mail_verification'           => 'off',
		'captcha'                     => 'off',
		'contact_text'                => 'Contact page description',
		'address_on_mail'             => '<strong>Bhargav Raviya</strong>,<br> Ahmedabad street,<br> India',
		'youtube_link'                => 'http://youtube.com/',
		'twitter_link'                => 'http://twitter.com/',
		'facebook_link'               => 'http://facebook.com/',
		'linkedin_link'               => 'http://linkedin.com/',
		'instagram_link'              => 'http://instagram.com/',
		'dribbble_link'               => 'http://dribbble.com/',
		];
		foreach ($settings as $key => $value) {
            $settings = Setting::firstOrNew(['key' => $key, 'value' => $value]);
            $settings->save();
        }
    }
}
