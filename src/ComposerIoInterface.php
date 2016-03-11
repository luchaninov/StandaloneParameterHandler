<?php

namespace Composer\IO;

interface IOInterface
{
    public function write($message);
    public function isInteractive();
    public function ask($message, $default);
}
