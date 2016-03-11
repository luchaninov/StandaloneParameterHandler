<?php

namespace Composer\IO;

use Symfony\Component\Console\Output\ConsoleOutput;

class ComposerIO implements IOInterface
{
    /** @var ConsoleOutput */
    private $output;

    public function __construct()
    {
        $this->output = new ConsoleOutput(ConsoleOutput::VERBOSITY_NORMAL, true);
    }

    public function write($message)
    {
        $this->output->write($message);
    }

    public function isInteractive()
    {
        return false;
    }

    public function ask($message, $default)
    {
        return $default;
    }
}
