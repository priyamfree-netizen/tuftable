<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DisableLanding extends Component
{

    use LivewireAlert;

    public $settings;
    public $disableLandingSite;
    public $landingType;

    public $facebook;
    public $instagram;
    public $twitter;
    public $yelp;
    public $metaKeyword;
    public $metaDescription;
    public $metaTitle;

    public function mount()
    {
        $this->disableLandingSite = $this->settings ? (bool)$this->settings->disable_landing_site : false;
        $this->landingType = 'static'; // Always static — dynamic editing removed
        $this->facebook = $this->settings ? $this->settings->facebook_link : '';
        $this->instagram = $this->settings ? $this->settings->instagram_link : '';
        $this->twitter = $this->settings ? $this->settings->twitter_link : '';
        $this->yelp = $this->settings ? $this->settings->yelp_link : '';
        $this->metaTitle = $this->settings ? $this->settings->meta_title : '';
        $this->metaKeyword = $this->settings ? $this->settings->meta_keyword : '';
        $this->metaDescription = $this->settings ? $this->settings->meta_description : '';
    }

    public function submitForm()
    {
        $this->settings->disable_landing_site = $this->disableLandingSite;
        $this->settings->landing_type = 'static'; // Always static
        $this->settings->landing_site_type = 'theme';
        $this->settings->facebook_link = $this->facebook;
        $this->settings->instagram_link = $this->instagram;
        $this->settings->twitter_link = $this->twitter;
        $this->settings->yelp_link = $this->yelp;
        $this->settings->meta_title = $this->metaTitle;
        $this->settings->meta_keyword = $this->metaKeyword;
        $this->settings->meta_description = $this->metaDescription;

        $this->settings->save();

        cache()->forget('global_setting');

        $this->alert('success', __('messages.settingsUpdated'), [
            'toast' => true,
            'position' => 'top-end',
            'showCancelButton' => false,
            'cancelButtonText' => __('app.close')
        ]);
    }

    public function render()
    {
        return view('livewire.forms.disable-landing');
    }
}
