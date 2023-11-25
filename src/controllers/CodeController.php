<?php
namespace app\controllers;


class CodeController  extends \app\source\controller\AbstractController{
    public function actionPut() {
        echo 'put';
        $request = $this->app->getRequest();
        print_r( $request->getContent());


        $job1 = new \Cron\Job\ShellJob();
        $job1->setCommand('touch tmp/test.txt');
        $job1->setSchedule(new \Cron\Schedule\CrontabSchedule('* * * * *'));
        
        $resolver = new \Cron\Resolver\ArrayResolver();
        $resolver->addJob($job1);

        $cron = new \Cron\Cron();
        $cron->setExecutor(new \Cron\Executor\Executor());
        $cron->setResolver($resolver);

        $cron->run();
    }

    public function actionDelete() {
        echo 'delete';
        $request = $this->app->getRequest();
        print_r( $request->getContent());
    }
}
