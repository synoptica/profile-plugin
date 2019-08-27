<?php namespace Synoptica\Profile\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Synoptica\Profile\Models\Profile;
use Synoptica\Profile\Models\Type;
use Synoptica\Profile\Models\Country;

use Carbon\Carbon;
use System\Models\File;
use Db;

class Sync extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'Synoptica.Profile:Sync';

    /**
     * @var string The console command description.
     */
    protected $description = 'Sync Profiles Synapsi';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        if (method_exists($this, 'sync_'.$this->argument('type'))){
            $this->{'sync_'.$this->argument('type')}();
        } else {
            $this->output->writeln('SYNC TYPE not found');
        }

        $this->output->writeln('**********************************');
    }

    
    protected function sync_profiles(){

        foreach(Db::select('SELECT * from synapsi.customers') as $c){
            
            if (!$c->customer_deleted){
                $c_id = (int)$c->customer_id;
                $profile = Profile::find($c_id);

                if (!$profile){
                    $profile = new Profile;
                    $profile->id = $c_id;
                } elseif (!$this->option('all')) {
                    // content exists
                    continue;
                }

                $profile->ingest($c);
                $profile->save();

                $this->output->writeln('Profile inserted/updated: '.$profile->firstname. " " .$profile->lastname);
            } 
        }
    }

    protected function sync_countries(){

        foreach(Db::select("
            SELECT * from synapsi.countries, synapsi.countries_i18n where country_deleted=0 
            and country_id=i18n_country_id and i18n_locale_code='it_IT'
            ") as $c){

            $c_id = (int)$c->country_id;
            $country = Country::find($c_id);

            if (!$country){
                $country = new Country;
                $country->id = $c_id;

            } elseif (!$this->option('all')) {
                // content exists
                continue;
            }

            $country->ingest($c);
            $country->name_en = $country->name;

            $country->save();

            $this->output->writeln('Country inserted/updated: '.$country->id. " " .$country->name);
            
        }
    }

    protected function sync_none(){}


    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['type', InputArgument::OPTIONAL, 'Sync type', 'none'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['all', null, InputOption::VALUE_OPTIONAL, 'sync all (optional)', null],
            ['articles', null, InputOption::VALUE_OPTIONAL, 'get articles (optional)', null],
            ['attachments', null, InputOption::VALUE_OPTIONAL, 'get attachments (optional)', null],
            ['old', null, InputOption::VALUE_OPTIONAL, 'sync obsolete contents (optional)', null],
        ];
    }

}
