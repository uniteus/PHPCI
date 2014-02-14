<?php
/**
 * PHPCI - Continuous Integration for PHP
 *
 * @copyright    Copyright 2013, Block 8 Limited.
 * @license      https://github.com/Block8/PHPCI/blob/master/LICENSE.md
 * @link         http://www.phptesting.org/
 */

namespace PHPCI\Model\Build;

/**
 * Gitlab Build Model
 * @author       Martin Jantošovič <jantosovic.martin@gmail.com>
 * @package      PHPCI
 * @subpackage   Core
 */
class GitoliteBuild extends RemoteGitBuild
{

    /**
     * Get link to commit from another source (i.e. Github)
     */
    public function getCommitLink()
    {
        return ''; // Not supported
    }

    /**
     * Get link to branch from another source (i.e. Github)
     */
    public function getBranchLink()
    {
        return ''; // Not supported
    }

    /**
     * Get the URL to be used to clone this remote repository.
     */
    protected function getCloneUrl()
    {
        return $this->getProject()->getReference();
    }
}
