<?php

namespace hongmizhijia\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 11);
        if ('hongmizhijia' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"phpdocumentor/template-"'
            );
        }

        return 'data/hongmizhijia/'.substr($package->getPrettyName(), 11);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'hongmizhijia' === $packageType;
    }
}