<?php namespace Synoptica\Profile;

use System\Classes\PluginBase;


use App;
use Config;
use Rainlab\User\Controllers\Users as UsersController;
use Rainlab\User\Models\User as UserModel;

use Auth;
use Event;
use Mail;
use Input;
use Backend;

class Plugin extends PluginBase
{
    public $require = ['RainLab.User'];

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
    
    public function register()
    {
        $this->registerConsoleCommand('Synoptica.Profile:Sync', 'Synoptica\Profile\Console\Sync');
    }

    public function registerPermissions()
    {
        return [
            'synoptica.profile.manage_settings' => [
                'tab'   => 'synoptica.profile::lang.plugin.name',
                'label' => 'synoptica.profile::lang.plugin.manage_settings_permission',
            ],
        ];
    }
    
    public function boot(){

        Event::listen('backend.menu.extendItems', function($manager) {

            // Add new side menu items 
            // parameters: Plugin ID, Menu Code, Menu Definitions. 
            $manager->addSideMenuItems('RainLab.User', 'user', [
                'users' => [
                    'label' => 'Users',
                    'icon'  => 'icon-user',
                    'code'  => 'users',
                    'owner' => 'RainLab.User',
                    'url'   => Backend::url('rainlab/user/users')
                ],
                'profiles' => [
                    'label' => 'Profiles',
                    'icon'  => 'icon-users',
                    'code'  => 'profiles',
                    'owner' => 'RainLab.User',
                    'url'   => Backend::url('synoptica/profile/profiles')
                ],
                'types' => [
                    'label' => 'Types',
                    'icon'  => 'icon-tags',
                    'code'  => 'types',
                    'owner' => 'RainLab.User',
                    'url'   => Backend::url('synoptica/profile/types')
                ],
            ]);
    
        });

        Event::listen('rainlab.user.activate', function($user) {
            
            /*
            // User Notification
            Mail::send('quivi.profile::activation.notify', [
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email
            ], function($message) {
                foreach (explode(",", env('ADMIN_EMAIL')) as $admin_email){
                    $message->to($admin_email);    
                }
                $message->subject('Conferma Attivazione Nuovo Utente');
            });
            */

        });

        UserModel::extend(function($model){
        });

        UsersController::extendFormFields(function($form, $model, $context){

            $form->addTabFields([
                'profile' => [
                    'label' => 'Profile',
                    'type' => 'relation',
                    'nameFrom' => "CONCAT(surname, ' ', name)",
                    'tab' => 'rainlab.user::lang.user.account'
                ],
                
            ]);
        });

    }
}
