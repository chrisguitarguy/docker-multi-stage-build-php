<?php declare(strict_types=1);

namespace Chrisguitarguy\DockerMulti;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class HelloCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure() : void
    {
        $this->setName('hello');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $in, OutputInterface $out) : int
    {
        $out->writeln('Hello');
        return 0;
    }
}
