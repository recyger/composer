<?php

namespace testing\composer;

use Composer\Composer;
use Composer\Installer\BinaryInstaller;
use Composer\IO\IOInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Util\Filesystem;

class Installer extends LibraryInstaller
{
    const TYPE_NAME = 'test';


    public function __construct(
        IOInterface $io,
        Composer $composer,
        $type = 'library',
        Filesystem $filesystem = null,
        BinaryInstaller $binaryInstaller = null
    )
    {
        parent::__construct($io, $composer, $type, $filesystem, $binaryInstaller);
        $this->vendorDir .= '/../';
    }


    /**
     * @inheritdoc
     */
    public function supports($packageType)
    {
        return strncasecmp($packageType, self::TYPE_NAME, strlen(self::TYPE_NAME)) === 0;
    }
}
