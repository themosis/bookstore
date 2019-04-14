<?php

namespace App\Hooks\Team;

use App\Teammate;
use Themosis\Hook\Hookable;
use Themosis\PostType\Contracts\PostTypeInterface;
use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Facades\PostType;

class People extends Hookable
{
    /**
     * Register a custom post type to handle a collection
     * of people.
     */
    public function register()
    {
        $team = $this->registerTeammates();
        $this->registerPropertiesMetabox($team);
        $this->registerAboutTemplateMetabox();
    }

    /**
     * Register the "team" custom post type to handle
     * a collection of teammates.
     *
     * @return PostTypeInterface
     */
    protected function registerTeammates(): PostTypeInterface
    {
        return PostType::make('bks-team', __('Teammates', APP_TD), __('Teammate', APP_TD))
            ->setArguments([
                'public' => false,
                'show_ui' => true,
                'menu_icon' => 'dashicons-groups',
                'supports' => ['title']
            ])
            ->setLabels([
                'menu_name' => __('Team', APP_TD)
            ])
            ->setTitlePlaceholder(__('Enter fullname here...', APP_TD))
            ->set();
    }

    /**
     * Register a metabox to handle teammate properties.
     *
     * @param PostTypeInterface $team
     */
    protected function registerPropertiesMetabox(PostTypeInterface $team)
    {
        Metabox::make('properties', $team->getName())
            ->add(Field::text('job', [
                'label' => __('Job Status', APP_TD),
                'rules' => 'required|min:3',
                'placeholder' => __('job status', APP_TD)
            ]))
            ->add(Field::media('pic', [
                'label' => __('Profile Image', APP_TD),
                'rules' => 'required',
                'type' => 'image',
                'placeholder' => __('profile image', APP_TD)
            ]))
            ->set();
    }

    /**
     * Register a metabox to handle team from a page
     * with a template of "about".
     */
    protected function registerAboutTemplateMetabox()
    {
        Metabox::make('team', 'page')
            ->add(Field::choice('teammates', [
                'label' => __('People', APP_TD),
                'choices' => $this->getTeammatesList(),
                'multiple' => true
            ]))
            ->setTemplate('about')
            ->set();
    }

    /**
     * Return a list of registered teammates for selection.
     *
     * @return array
     */
    protected function getTeammatesList(): array
    {
        $teammates = Teammate::where('post_status', 'publish')
            ->orderby('post_name', 'asc')
            ->take(200)
            ->get();

        return $teammates->mapWithKeys(function ($item) {
            return [$item->post_title => $item->ID];
        })->all();
    }
}
