<?php

namespace Luchaninov\StandaloneParameterHandler;

use Composer\IO\ComposerIO;
use Incenteev\ParameterHandler\Processor;

class ScriptHandler
{
    public static function buildParameters()
    {
        $filename = __DIR__ . '/../../../../composer.json';
        if (!is_file($filename)) {
            throw new \InvalidArgumentException('Cannot find composer.json');
        }

        $composerData = json_decode(file_get_contents($filename), true);
        if (empty($composerData) || !is_array($composerData)) {
            throw new \InvalidArgumentException('Cannot decode composer.json');
        }
        if (!isset($composerData['extra'])) {
            throw new \InvalidArgumentException('composer.json doesn\'t contain "extras"');
        }

        $extras = $composerData['extra'];

        if (!isset($extras['incenteev-parameters'])) {
            throw new \InvalidArgumentException('The parameter handler needs to be configured through the extra.incenteev-parameters setting.');
        }

        $configs = $extras['incenteev-parameters'];

        if (!is_array($configs)) {
            throw new \InvalidArgumentException('The extra.incenteev-parameters setting must be an array or a configuration object.');
        }

        if (array_keys($configs) !== range(0, count($configs) - 1)) {
            $configs = array($configs);
        }

        $processor = new Processor(new ComposerIO());

        foreach ($configs as $config) {
            if (!is_array($config)) {
                throw new \InvalidArgumentException('The extra.incenteev-parameters setting must be an array of configuration objects.');
            }

            $processor->processFile($config);
        }
    }
}
