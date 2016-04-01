<?php

namespace testing\composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
class Installer extends LibraryInstaller
{
    const TYPE_NAME = 'test';


    /**
     * @inheritdoc
     */
    public function supports($packageType)
    {
        return strncasecmp($packageType, self::TYPE_NAME, strlen(self::TYPE_NAME)) === 0;
    }
    
    public function getInstallPath(PackageInterface $package) {
        return $this->vendorDir . '/../testing/';
    }
}
