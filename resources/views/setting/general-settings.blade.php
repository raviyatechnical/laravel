<div class="panel panel-default">
	<div class="panel-heading no-bg panel-settings">
		<h3 class="panel-title">
			Website settings
		</h3>
	</div>
	<div class="panel-body nopadding">
		<ul class="nav nav-pills heading-list">
			<li class="active"><a href="#general" data-toggle="pill" class="header-text">General</a></li>
			<li class="divider">&nbsp;</li>
			<li class=""><a href="#homepage" data-toggle="pill" class="header-text">Homepage</a></li>
		</ul>
	</div>
	<div class="tab-content nopadding">
		<div id="general" class="tab-pane fade active in">
			<div class="socialite-form">
				<x-alert/>
				<form method="POST" action="{{ route('updateGeneralSettings') }}" enctype="multipart/form-data" files="true">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('site_name', 'Site name') }}
								{{ Form::text('site_name', $settings->site_name, array('class' => 'form-control', 'placeholder' => trans('admin.site_name') )) }}
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('site_title', trans('admin.site_title')) }}
								{{ Form::text('site_title', $settings->site_title , array('class' => 'form-control', 'placeholder' => trans('admin.site_title'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('logo', trans('admin.change_logo')) }}
								{{ Form::file('logo', array('id' => 'logo')) }}
							</fieldset>
						</div>
						<div class="col-md-3">
							<img id="logo" class="socialite-logo" src="{{ url('setting/'.$settings->logo) }}" alt="Socialite logo" title="Socialite logo"/>
						</div>
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('favicon', trans('admin.change_favicon')) }}
								{{ Form::file('favicon', array('id' => 'favicon', 'accept' => 'image/jpeg,image/png,image/gif,image/ico')) }}
							</fieldset>
						</div>
						<div class="col-md-3">
							<img id="favicon" class="socialite-favicon" src="{{ url('setting/'.$settings->favicon) }}" alt="Socialite favicon" title="Socialite favicon" height="50" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('support_email', trans('admin.support_mail')) }}
								{{ Form::email('support_email', $settings->support_email, array('class' => 'form-control'
								,'placeholder' => 'admin@socialite.com')) }}
							</fieldset>
						</div>

						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('noreply_email', trans('admin.no_reply_mail')) }}
								{{ Form::email('noreply_email', $settings->noreply_email , array('class' => 'form-control'
								,'placeholder' => 'noreply@socialite.com')) }}
							</fieldset>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('language', trans('admin.default_language')) }}
								{{ Form::select('language',Config::get('app.locales'), $settings->language, array('class' => 'form-control col-sm-6')) }}
							</fieldset>
						</div>

						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('site_tagline', trans('admin.site_tagline')) }}
								{{ Form::text('site_tagline', $settings->site_tagline, array('class' => 'form-control', 'placeholder' => trans('admin.site_tagline'))) }}
							</fieldset>
						</div>					
					</div>

					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('site_url', trans('admin.website_url')) }}
								{{ Form::text('site_url', $settings->site_url, array('class' => 'form-control', 'placeholder' => trans('admin.website_url'))) }}
							</fieldset>
						</div>

						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('enable_rtl', trans('admin.enable_rtl')) }}
								{{ Form::select('enable_rtl', array('on' => trans('admin.on'), 'off' => trans('admin.off')), $settings->enable_rtl, ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>					
					</div>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('contact_text', trans('admin.contact_text')) }}
								{{ Form::textarea('contact_text', $settings->contact_text, array('class' => 'form-control', 'placeholder' => trans('admin.contact_help_text'), 'rows' => '5')) }}
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('address_on_mail', trans('admin.address_on_mail')) }}
								{{ Form::textarea('address_on_mail', $settings->address_on_mail, array('class' => 'form-control', 'placeholder' => trans('admin.address_on_mail_text'), 'rows' => '5')) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('meta_description', trans('admin.meta_description')) }}
								{{ Form::textarea('meta_description', $settings->meta_description, array('class' => 'form-control', 'placeholder' => trans('admin.meta_description_placeholder'), 'rows' => '5')) }}
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('meta_keywords', trans('admin.meta_keywords')) }}
								{{ Form::textarea('meta_keywords', $settings->meta_keywords, array('class' => 'form-control', 'placeholder' => trans('admin.meta_keywords_placeholder'), 'rows' => '5')) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('enable_browse', trans('admin.enable_browse')) }}
								{{ Form::select('enable_browse', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('enable_browse', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('google_analytics', trans('admin.google_analytics')) }}
								{{ Form::textarea('google_analytics', $settings->google_analytics, array('class' => 'form-control', 'rows' => '5')) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('title_seperator', trans('admin.add_title_seperator')) }}
								{{ Form::text('title_seperator', Setting::get('title_seperator'), array('class' => 'form-control','placeholder' => trans('admin.title_seperator_placeholder'))) }}
							</fieldset>
						</div>
						<div class="col-md-6">

						</div>

					</div>

					<h3>{{ trans('admin.fields_on_registration') }}</h3><hr>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('mail_verification', trans('admin.mail_verification')) }}
								{{ Form::select('mail_verification', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('mail_verification', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('city', trans('admin.city_register')) }}
								{{ Form::select('city', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('city', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('birthday', trans('common.birthday')) }}
								{{ Form::select('birthday', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('birthday', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('captcha', trans('admin.captcha_register')) }}
								{{ Form::select('captcha', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('captcha', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>
					</div>						

					<h3>{{ trans('admin.footer_Settings') }}</h3><hr>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('footer_languages', trans('admin.enable_languages_list')) }}
								{{ Form::select('footer_languages', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('footer_languages', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')]) }}
							</fieldset>
						</div>
					</div>

					<h3>{{ trans('admin.social_settings') }}</h3><hr>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('youtube_link', trans('admin.youtube_link')) }}
								<div class="input-group youtube-input-group">
									<div class="input-group-addon youtube-btn"><i class="fa fa-youtube"></i></div>
									{{ Form::text('youtube_link', Setting::get('youtube_link'), array('class' => 'form-control', 'placeholder' => trans('admin.youtube_link'))) }}
								</div>
							</fieldset>
						</div>

						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('facebook_link', trans('admin.facebook_link')) }}
								<div class="input-group facebook-input-group">
									<div class="input-group-addon fb-btn"><i class="fa fa-facebook"></i></div>
									{{ Form::text('facebook_link', Setting::get('facebook_link'), array('class' => 'form-control account-form', 'placeholder' => trans('admin.facebook_link'))) }}
								</div>
							</fieldset>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('twitter_link', trans('admin.twitter_link')) }}
								<div class="input-group twitter-input-group">
									<div class="input-group-addon twitter-btn"><i class="fa fa-twitter"></i></div>
									{{ Form::text('twitter_link', Setting::get('twitter_link'), array('class' => 'form-control', 'placeholder' => trans('admin.twitter_link'))) }}
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('linkedin_link', trans('admin.linkedin_link')) }}
								<div class="input-group linkedin-input-group">
									<div class="input-group-addon linkedin-btn"><i class="fa fa-linkedin"></i></div>
									{{ Form::text('linkedin_link', Setting::get('linkedin_link'), array('class' => 'form-control', 'placeholder' => trans('admin.linkedin_link'))) }}
								</div>
							</fieldset>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('instagram_link', trans('admin.instagram_link')) }}
								<div class="input-group instagram-input-group">
									<div class="input-group-addon instagram-btn"><i class="fa fa-instagram"></i></div>
									{{ Form::text('instagram_link', Setting::get('instagram_link'), array('class' => 'form-control', 'placeholder' => trans('admin.instagram_link'))) }}
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								{{ Form::label('dribbble_link', trans('admin.dribbble_link')) }}
								<div class="input-group dribbble-input-group">
									<div class="input-group-addon dribbble-btn"><i class="fa fa-dribbble"></i></div>
									{{ Form::text('dribbble_link', Setting::get('dribbble_link'), array('class' => 'form-control', 'placeholder' => trans('admin.dribbble_link'))) }}
								</div>
							</fieldset>
						</div>
					</div>

					<div class="pull-right">
						{{ Form::submit(trans('common.save_changes'), ['class' => 'btn btn-success']) }}
					</div>
					<div class="clearfix"></div>
				</form>
			</div><!-- /Socialite-form -->
		</div><!-- /General settings content -->

		<div id="homepage" class="tab-pane fade">
			<div class="socialite-form">
				@include('flash::message')
				<form method="POST" action="{{ url('admin/home-settings') }}" enctype="multipart/form-data" files="true">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<fieldset class="form-group">
								{{ Form::label('home_welcome_message', trans('common.home_welcome_message')) }}
								{{ Form::text('home_welcome_message', Setting::get('home_welcome_message'), array('class' => 'form-control', 'placeholder' => trans('common.home_welcome_message_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<fieldset class="form-group">
								{{ Form::label('home_widget_one', trans('common.home_widget_one')) }}
								{{ Form::textarea('home_widget_one', Setting::get('home_widget_one'), array('class' => 'form-control', 'placeholder' => trans('common.home_widget_one_text'), 'rows' => '5')) }}
							</fieldset>
						</div>
						<div class="col-md-4">
							<fieldset class="form-group">
								{{ Form::label('home_widget_two', trans('common.home_widget_two')) }}
								{{ Form::textarea('home_widget_two', Setting::get('home_widget_two'), array('class' => 'form-control', 'placeholder' => trans('common.home_widget_two_text'), 'rows' => '5')) }}
							</fieldset>
						</div>
						<div class="col-md-4">
							<fieldset class="form-group">
								{{ Form::label('home_widget_three', trans('common.home_widget_three')) }}
								{{ Form::textarea('home_widget_three', Setting::get('home_widget_three'), array('class' => 'form-control', 'placeholder' => trans('common.home_widget_three_text'), 'rows' => '5')) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<fieldset class="form-group">
								{{ Form::label('home_list_heading', trans('common.home_list_heading')) }}
								{{ Form::text('home_list_heading', Setting::get('home_list_heading'), array('class' => 'form-control', 'placeholder' => trans('common.home_list_heading_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-info">
								<i class="fa fa-info-circle"></i> Please select icons and copy paste the icon code from <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a> website.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_one_icon', trans('common.home_feature_one_icon')) }}
								{{ Form::text('home_feature_one_icon', Setting::get('home_feature_one_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_one_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_one', trans('common.home_feature_one')) }}
								{{ Form::text('home_feature_one', Setting::get('home_feature_one'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_one_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_two_icon', trans('common.home_feature_two_icon')) }}
								{{ Form::text('home_feature_two_icon', Setting::get('home_feature_two_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_two_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_two', trans('common.home_feature_two')) }}
								{{ Form::text('home_feature_two', Setting::get('home_feature_two'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_two_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_three_icon', trans('common.home_feature_three_icon')) }}
								{{ Form::text('home_feature_three_icon', Setting::get('home_feature_three_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_three_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_three', trans('common.home_feature_three')) }}
								{{ Form::text('home_feature_three', Setting::get('home_feature_three'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_three_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_four_icon', trans('common.home_feature_four_icon')) }}
								{{ Form::text('home_feature_four_icon', Setting::get('home_feature_four_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_four_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_four', trans('common.home_feature_four')) }}
								{{ Form::text('home_feature_four', Setting::get('home_feature_four'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_four_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_five_icon', trans('common.home_feature_five_icon')) }}
								{{ Form::text('home_feature_five_icon', Setting::get('home_feature_five_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_five_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_five', trans('common.home_feature_five')) }}
								{{ Form::text('home_feature_five', Setting::get('home_feature_five'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_five_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_six_icon', trans('common.home_feature_six_icon')) }}
								{{ Form::text('home_feature_six_icon', Setting::get('home_feature_six_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_six_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_six', trans('common.home_feature_six')) }}
								{{ Form::text('home_feature_six', Setting::get('home_feature_six'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_six_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_seven_icon', trans('common.home_feature_seven_icon')) }}
								{{ Form::text('home_feature_seven_icon', Setting::get('home_feature_seven_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_seven_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_seven', trans('common.home_feature_seven')) }}
								{{ Form::text('home_feature_seven', Setting::get('home_feature_seven'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_seven_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_eight_icon', trans('common.home_feature_eight_icon')) }}
								{{ Form::text('home_feature_eight_icon', Setting::get('home_feature_eight_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_eight_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_eight', trans('common.home_feature_eight')) }}
								{{ Form::text('home_feature_eight', Setting::get('home_feature_eight'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_eight_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_nine_icon', trans('common.home_feature_nine_icon')) }}
								{{ Form::text('home_feature_nine_icon', Setting::get('home_feature_nine_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_nine_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_nine', trans('common.home_feature_nine')) }}
								{{ Form::text('home_feature_nine', Setting::get('home_feature_nine'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_nine_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<fieldset class="form-group">
								{{ Form::label('home_feature_ten_icon', trans('common.home_feature_ten_icon')) }}
								{{ Form::text('home_feature_ten_icon', Setting::get('home_feature_ten_icon'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_ten_icon_text'))) }}
							</fieldset>
						</div>
						<div class="col-md-9">
							<fieldset class="form-group">
								{{ Form::label('home_feature_ten', trans('common.home_feature_ten')) }}
								{{ Form::text('home_feature_ten', Setting::get('home_feature_ten'), array('class' => 'form-control', 'placeholder' => trans('common.home_feature_ten_text'))) }}
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="pull-right">
							{{ Form::submit(trans('common.save_changes'), ['class' => 'btn btn-success']) }}
						</div>
					</div>
					
				</form>
			</div>
		</div><!-- /homepage settings content -->

	</div><!-- /tab-content -->
</div><!-- /panel -->



