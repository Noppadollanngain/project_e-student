<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Crypt;
class FirebaseConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firebase:store';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store Firebase Auto';
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
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/test-project-9d73f-firebase-adminsdk-brci2-d720a70bbf.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)
                                 ->withDatabaseUri('https://test-project-9d73f.firebaseio.com')
                                 ->create();
        $database = $firebase->getDatabase();
        $data = DB::table('users')
                    ->select('id','username','email','password_firebase')
                    ->get();
        foreach ($data as $dataset){
            $newPost = $database->getReference('Users/Data/'.$dataset->id)
                             ->set([
                                'username' => $dataset->username,
                                'password' => $dataset->password_firebase,
                                'email' => $dataset->email
                             ]);
        }
    }
}