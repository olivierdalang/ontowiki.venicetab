<?php
/**
 * This file is part of the {@link http://ontowiki.net OntoWiki} project.
 *
 * @copyright Copyright (c) 2013, {@link http://aksw.org AKSW}
 * @license   http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 */

/**
 * @category   OntoWiki
 * @package    Extensions_Venice
 * @author     Philipp Frischmuth <pfrischmuth@googlemail.com>
 * @author     Jonas Brekle <jonas.brekle@gmail.com>
 * @author     Natanael Arndt <arndtn@gmail.com>
 */
class VeniceController extends OntoWiki_Controller_Component
{
    public function homeAction()
    {

        $this->addModuleContext('main.window.venice');
        $this->view->placeholder('main.window.title')->set('VTM Page');

        $helper = $this->_owApp->extensionManager->getComponentHelper('venice');

        // get versioning
        $versioning = $this->_erfurt->getVersioning();

        $test = $helper->testingtesting($versioning);

        $this->view->infomessage = 'did it work ?';

    }

}
