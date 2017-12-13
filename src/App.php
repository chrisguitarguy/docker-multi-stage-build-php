<?php declare(strict_types=1);

namespace Chrisguitarguy\DockerMulti;

use Symfony\Component\Console\Application as SymfonyApp;

final class App extends SymfonyApp
{
    public function __construct()
    {
        parent::__construct('Docker Multi-Stage Hello', 'dev');
        $this->add(new HelloCommand());
        $this->setDefaultCommand('hello', true);
    }
}
