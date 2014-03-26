<?php
/**
* PHPCI - Continuous Integration for PHP
*
* @copyright    Copyright 2013, Block 8 Limited.
* @license      https://github.com/Block8/PHPCI/blob/master/LICENSE.md
* @link         http://www.phptesting.org/
*/

namespace PHPCI;

use b8\Store\Factory;
use PHPCI\Model\Build;

/**
* PHPCI Build Factory - Takes in a generic "Build" and returns a type-specific build model.
* @author   Dan Cryer <dan@block8.co.uk>
*/
class BuildFactory
{
    /**
     * @param $buildId
     * @return Build
     */
    public static function getBuildById($buildId)
    {
        $build = Factory::getStore('Build')->getById($buildId);

        return self::getBuild($build);
    }

    /**
    * Takes a generic build and returns a type-specific build model.
    * @param Build $base The build from which to get a more specific build type.
    * @return Build
    */
    public static function getBuild(Build $base)
    {
        switch($base->getProject()->getType())
        {
            case 'remote':
                $type = 'RemoteGitBuild';
                break;
            case 'local':
                $type = 'LocalBuild';
                break;
            case 'github':
                $type = 'GithubBuild';
                break;
            case 'bitbucket':
                $type = 'BitbucketBuild';
                break;
            case 'gitlab':
                $type = 'GitlabBuild';
                break;
            case 'gitolite':
                $type = 'GitoliteBuild';
                break;
            case 'hg':
                $type = 'MercurialBuild';
                break;
        }

        $type = '\\PHPCI\\Model\\Build\\' . $type;

        return new $type($base->getDataArray());
    }
}
