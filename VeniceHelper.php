<?php
/**
 * This file is part of the {@link http://ontowiki.net OntoWiki} project.
 *
 * @copyright Copyright (c) 2013, {@link http://aksw.org AKSW}
 * @license   http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 */

/**
 * Helper class for the Venice component.
 *
 * - register the tab for navigation on properties view
 *
 * @category   OntoWiki
 * @package    Extensions_Venice
 */
class VeniceHelper extends OntoWiki_Component_Helper
{
    public function init()
    {
        /*
         * check for $request->getParam('mode') == 'multi' if tab should also be displayed for
         * multiple resources/lists ($request->getActionName() == 'instances')
         * And set 'mode' => 'multi' to tell the controller the multi mode
         *
         * Multi mode was disabled because it doesn't seam to work
         */

        $owApp = OntoWiki::getInstance();

        if ($owApp->lastRoute == 'properties' && $owApp->selectedResource != null) {
            $owApp->getNavigation()->register(
                'venice',
                array(
                    'controller' => 'venice',
                    'action'     => 'home',
                    'name'       => 'Venice',
                    'mode'       => 'single',
                    'priority'   => 50
                )
            );
        }
    }

    public function testingtesting($versioning){
        $store      = $this->_owApp->erfurt->getStore();
        $graph      = $this->_owApp->selectedModel;
        $resource   = $this->_owApp->selectedResource;

        // action spec for versioning
        $actionSpec                = array();
        $actionSpec['type']        = 20;
        $actionSpec['modeluri']    = (string)$graph;
        $actionSpec['resourceuri'] = $resource;


        // starting action
        $versioning->startAction($actionSpec);

        // query for all triples to delete them
        //$sparqlQuery = 'DELETE { ?s ?p ?o . } WHERE { ?s ?p ?o . <'.$resource.'> <http://www.w3.org/2000/01/rdf-schema#label> ?o . };';

        $store->addStatement((string)$graph, $resource, 'http://www.w3.org/2000/01/rdf-schema#label', ['value'=>"a better label",'type'=>"literal"]);

        // stopping action
        $versioning->endAction();



    }

}
