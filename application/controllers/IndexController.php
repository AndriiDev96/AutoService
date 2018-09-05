<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function servicesAction()
    {
        $this->view->headTitle('Services');

        $type = $this->_getParam("type");
        $this->view->type = $type;

        $servicesList = array();
        $servicesList[] = "Oil Change";
        $servicesList[] = "Electrical Services";
        $servicesList[] = "Brake Disc & Pads";
        $servicesList[] = "Filter Replacement";
        $servicesList[] = "Battery Replacement";
        $servicesList[] = "Engine Diagnostics";
        $servicesList[] = "Repair Transmissions";
        $servicesList[] = "Repair Steering Rod";
        $servicesList[] = "Replacement Shock Absorbers";

        $this->view->services = $servicesList;
    }

    public function contactsAction()
    {
        $this->view->headTitle('Contacts');


    }

    public function orderAction()
    {
        // action body
    }


    public function aboutAction()
    {

    }

}








