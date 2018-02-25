<?php

function loadTemplate($title = 'HOME', $viewName = '', $viewData = array()) {
    require 'pages/template.php';

}

function loadViewInTemplate($viewName = '', $viewData = array()) {
    extract($viewData);
    require 'pages/'.$viewName.'.php';
}

