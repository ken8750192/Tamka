<?php
/**
 * @version     $id: multiple.html.php
 * @package     Molajo
 * @subpackage  Display View
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License Version 2, or later http://www.gnu.org/licenses/gpl.html
 */
defined('MOLAJO') or die();

/**
 * View to Display All Layouts, except the Editor Layout
 *
 * @package	Molajo
 * @subpackage	Display View
 * @since	1.0
 */
class MolajoViewDisplay extends MolajoView
{
    /**
     * @var $options object
     *
     * Contains all options which can be retrieved as this->state->get('option_name')
     *
     * 1. Filters and filtered values (for Administrator) - ex. $this->state->get('filter.category')
     *
     * 2. Merged Component Parameters (Global Options, Menu Item, Item)
     *    A. Including those used as selection criteria - ex. $this->state->get('filter.category')
     *    B. And those parameters needed by the layout - ex. $this->option->get('layout.show_title')
     *
     * 3. Component Request Variables
     *    $this->state->get('request.option'), and 'component_' + model, view, layout, default_view, single_view and task
     *
     * 4. 
     *
     */

    /** used in manager */

    /**
     * @var $render object
     */
    protected $render;

    /**
     * @var s$aveOrder string
     */
    protected $saveOrder;

    /** blog variables
     move variables into $options
     retrieve variables here in view - and split int rowset if needed
     */
	protected $category;
	protected $children;
	protected $lead_items = array();
	protected $intro_items = array();
	protected $link_items = array();
	protected $columns = 1;

    /**
     * display
     *
     * View for Display View that uses no forms
     *
     * @param null $tpl
     * @return bool
     */
    public function display($tpl = null)
    {
        /** 1. Get State */
        $this->state      = $this->get('State');

        /** 2. Get System Variables */
        parent::display($tpl);

        /** 3. Output Layout for System Requests */
        //echo $this->getColumns ('system');

        /** 4. Retrieve Query Results */
        $this->rowset     = $this->get('Items');

        /** 5. Retrieve Layout Parameters */
        if (JFactory::getApplication()->getName() == 'site') {
           $this->params = JFactory::getApplication()->getParams();
   //         $this->_mergeParams ();
//		$this->getState('request.option')->get('page_class_suffix', '') = htmlspecialchars($this->params->get('pageclass_sfx'));
        } else {
           $this->params = JComponentHelper::getParams(JRequest::getCmd('option'));
        }

        /** 6. Get Pagination data */
        $this->pagination = $this->get('Pagination');

        /** 7. Optional data */
//		$this->category	            = $this->get('Category');
//		$this->categoryAncestors    = $this->get('Ancestors');
//		$this->categoryParent       = $this->get('Parent');
//		$this->categoryPeers	    = $this->get('Peers');
//		$this->categoryChildren	    = $this->get('Children');

//      $this->authorProfile        = $this->get('Author');

//      $this->tags (tag cloud)
//      $this->tagCategories (menu)
//      $this->calendar

//Navigation
//$this->navigation->get('form_return_to_link')
//$this->navigation->get('previous')
//$this->navigation->get('next')
//
// Pagination
//$this->navigation->get('pagination_start')
//$this->navigation->get('pagination_limit')
//$this->navigation->get('pagination_links')
//$this->navigation->get('pagination_ordering')
//$this->navigation->get('pagination_direction')
//$this->breadcrumbs
//$total = $this->getTotal();
        /**
$this->configuration

Parameters (Includes Global Options, Menu Item, Item)
$this->params->get('layout_show_page_heading', 1)
$this->params->get('layout_page_class_suffix', '')
 */

        /** process model errors */
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }

        /**
         * Navigation
         */
        if (JFactory::getApplication()->getName() == 'site') {

        }

        $this->layoutFolder = $this->findPath($this->state->get('request.layout'));
        if ($this->layoutFolder === false) {
            parent::display($tpl);
        } else {
            echo $this->renderMolajoLayout ();
        }
    }

    /**
    * renderMolajoLayout
    *
    * Loads Language, Document Head, Toolbar/Submenu and CSS
    *
    * Loops through rowset, one row at a time, including top, header, body, footer, and bottom files
    *
    * @param $this->layoutFolder
    * @return string
    */
    protected function renderMolajoLayout ($layout='')
    {
        /** @var $rowCount */
        $rowCount = 1;

        /** start collecting output */
        ob_start();

    /**
    *  I. Rowset processed by Layout
    *
    *  If the body.php file does not existing in the layoutFolder
    *      include the custom.php file which handles $this->rowset processing
    *
    */
        if (!file_exists($this->layoutFolder.'/layouts/body.php')) {
            if (file_exists($this->layoutFolder.'/layouts/custom.php')) {
                include $this->layoutFolder.'/layouts/custom.php';
            }

        } else {

        /**
        * II. Loop through each row, one at a time
        *
        * The following layoutFolder/layouts/ files are included, if existing
        *
        * 1. Before any rows and if there is a top.php file:
        *       beforeDisplayContent output is rendered;
        *       the top.php file is included.
        *
        * 2. For each row:
        *
        *      if there is a header.php file, it is included,
        *        and the event afterDisplayTitle output is rendered.
        *
        *      If there is a body.php file, it is included;
        *
        *      If there is a footer.php file, it is included;
        *
        * 3. After all rows and if there is a footer.php file:
        *      the footer.php file is included;
        *      afterDisplayContent output is rendered;
        *
        */
            foreach ($this->rowset as $this->row) {

                /** layout: top */
                if ($rowCount == 1 && (!$layout == 'system')) {

                    /**
                     * load Language, Document Head, Toolbar/Submenu,
                     *  and JS/CSS (Site, Component, and Layout)
                     *  In most cases, only included for a component display
                     */
                    if (file_exists(MOLAJO_LAYOUTS.'/include/head.php')) {
                        include MOLAJO_LAYOUTS.'/include/head.php';
                    }

                    /** event: Before Content Display */
                    if (isset($this->row->event->beforeDisplayContent)) {
                        echo $this->row->event->beforeDisplayContent;
                    }

                    if (file_exists($this->layoutFolder.'/layouts/top.php')) {
                        include $this->layoutFolder.'/layouts/top.php';
                    }
                }

                /** item: header */
                if (file_exists($this->layoutFolder.'/layouts/header.php')) {
                    include $this->layoutFolder.'/layouts/header.php';

                    /** event: After Display of Title */
                    if (isset($this->row->event->afterDisplayTitle)) {
                        echo $this->row->event->afterDisplayTitle;
                    }
                }

                /** item: body */
                if (file_exists($this->layoutFolder.'/layouts/body.php')) {
                    include $this->layoutFolder.'/layouts/body.php';
                }

                /** item: footer */
                if (file_exists($this->layoutFolder.'/layouts/footer.php')) {
                    include $this->layoutFolder.'/layouts/footer.php';
                }

                $rowCount++;
            }

            /** layout: bottom */
            if (file_exists($this->layoutFolder.'/layouts/bottom.php')) {
                include $this->layoutFolder.'/layouts/bottom.php';

                /** event: After Layout is finished */
                if (isset($this->row->event->afterDisplayContent)) {
                    echo $this->row->event->afterDisplayContent;
                }
            }
        }

        /** collect output */
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}