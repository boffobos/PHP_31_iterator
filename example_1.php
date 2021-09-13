<?php
    
    $html = new DOMDocument();
    
    libxml_use_internal_errors(true);
    
    //Load sourse html file
    $html->loadHTMLFile("main.html");
    
    //Getting from document nessesary nodes
    $metas = $html->getElementsByTagName('meta');
    
    $metasToRemove = [];
    
    //making array of DOM nodes to delete from document
    foreach($metas as $meta){
        if($meta->getAttribute('name') ==='keywords' || $meta->getAttribute('name') ==='description'){
            $metasToRemove[] = $meta;
        }
    }

    //removing DOM nodes from document
    foreach($metasToRemove as $element){
        $element->parentNode->removeChild($element);
    }

    
    $html->saveHTMLFile('example_1.html');

