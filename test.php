<?php
require_once 'vendor/autoload.php';

class MyLogger extends \Monolog\Logger
{
    public function warning($message, array $context = [])
    {
        $message = '[warning] ' . $message;
        return parent::warning($message, $context);
    }
}

class MyBehaviour
{
    public function doSomething(\Psr\Log\LoggerInterface $myLogger)
    {
        $myLogger->notice('Hello World');
    }
}

class MyApp
{
    public function execute($config = [])
    {
        $myLogger = $this->loggerFactory($config);

        $myBehaviour = new MyBehaviour();
        $myBehaviour->doSomething($myLogger);
    }

    private function loggerFactory($config = [])
    {
        if (!isset($config['logger'])) {
            return $this->getDefaultLogger();
        }

        if ($config['logger'] === 'mylogger') {
            return $this->getDefaultLogger();
        }

        return new MyLogger('test');
    }

    private function getDefaultLogger()
    {
        return new Monolog\Logger('test');
    }
}

//$config['logger'] = 'mylogger';
$myApp = new MyApp;
$myApp->execute();




