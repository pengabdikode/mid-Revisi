<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class addUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ini untuk tambah user';

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
        $user=new \App\User;
        $user->name='tatang';
        $user->email=str_random(9);
        $user->password=\Hash::make('123456');
        $user->save();
    }
}
