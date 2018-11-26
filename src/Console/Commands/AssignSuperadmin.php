<?php

namespace Codiiv\Chatter\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Codiiv\Chatter\Models\Option;

class AssignSuperadmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chatter:superadmin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a default super admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');

        if(User::where('email',$email)->exists()){
          $userX  = User::where('email',$email)->first();
          $userid  = $userX->id;
          $option = new Option;
          $adminset = Option::where('option_name','master_admin')->where('option_value',$userid)->first();
          if($adminset){
            $option->option_name = 'master_admin';
            $option->option_value = $userid;
            $option->autoload = 1;
            $option->update();
            echo 'Master admin updated successfully'. PHP_EOL;
            return '';
          }else{
            $option->option_name = 'master_admin';
            $option->autoload = 1;
            $option->option_value = $userid;
            $saved  = $option->save();
            $lastInsertedId = $option->id;
            if($lastInsertedId){
              echo 'Master admin set successfully'. PHP_EOL;
              return '';
            }else{
              echo 'There were errors setting admin'. PHP_EOL;
              return '';
            }
          }
        }else{
          echo 'User does NOT exist'. PHP_EOL;
        }
      exit;
    }
}
