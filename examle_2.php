<?php 
    require_once 'RecursiveDOMIterator.php';
    libxml_use_internal_errors(true);
    
    $dom = new DOMDocument();
    $dom->loadHTMLFile('main.html');

    $elements = new RecursiveIteratorIterator( new RecursiveDOMIterator($dom), 
    RecursiveIteratorIterator::SELF_FIRST);

    $domNodeList = $dom->childNodes;
    $toDelete = [];
    foreach($elements as $element){
        if($element->hasAttributes()){
            if($element->nodeName ==='meta' && $element->getAttribute('name') === 'keywords' || $element->getAttribute('name') === 'description'){
                $toDelete[] = $element;
            }
        }
    }

    foreach($toDelete as $element){
        $element->parentNode->removeChild($element);
    }

    $dom->saveHTMLFile('example_2.html');

  
