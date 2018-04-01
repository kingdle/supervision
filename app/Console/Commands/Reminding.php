<?php

namespace App\Console\Commands;

use App\Models\Post;
use HyanCat\ShortMessenger\ShortMessage;
use HyanCat\ShortMessenger\SmsServiceFacade;
use Illuminate\Console\Command;

class Reminding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reminding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminding the staff';

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
        $data = date("Y-m-d",time());
        $projects = Post::where('NODE_LEVEL','=','1')->where('updated_at','not like','$data')->get();//('PROJECT_NAME', 'PLAN_NAME','BUSINESS_MATTER_NAME','UNDER_TAKE_USER');

        print_r($projects);
//        foreach ($projects as $project) {
//            echo $project->PROJECT_NAME;
//        }



//        SmsServiceFacade::send('18661737287', function (ShortMessage $message) {
//            $message->template('13481')
//                ->data(['project' => '高速公路连接线']);
//        });
//        echo '短信发送成功';
    }
}
