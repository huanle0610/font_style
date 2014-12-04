<?php

require_once 'lib/phpPowerpoint/src/PhpPowerpoint/Autoloader.php';
\PhpOffice\PhpPowerpoint\Autoloader::register();


$objPHPPowerPoint = new \PhpOffice\PhpPowerpoint\PhpPowerpoint();

// Create slide
$currentSlide = $objPHPPowerPoint->getActiveSlide();

// Create a shape (drawing)
$shape = $currentSlide->createDrawingShape();
$shape->setName('PHPPowerPoint logo')
    ->setDescription('PHPPowerPoint logo')
    ->setPath('./resources/phppowerpoint_logo.gif')
    ->setHeight(36)
    ->setOffsetX(10)
    ->setOffsetY(10);
$shape->getShadow()->setVisible(true)
    ->setDirection(45)
    ->setDistance(10);

// Create a shape (text)
$shape = $currentSlide->createRichTextShape()
    ->setHeight(300)
    ->setWidth(600)
    ->setOffsetX(170)
    ->setOffsetY(180);
$shape->getActiveParagraph()->getAlignment()->setHorizontal(\PhpOffice\PhpPowerpoint\Alignment::HORIZONTAL_CENTER );
$textRun = $shape->createTextRun('Thank you for using PHPPowerPoint!');
$textRun->getFont()->setBold(true)
    ->setSize(60)
    ->setColor( new Color( 'FFE06B20' ) );

$oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
$oWriterPPTX->save(__DIR__ . "/sample.pptx");
$oWriterODP = IOFactory::createWriter($objPHPPowerPoint, 'ODPresentation');
$oWriterODP->save(__DIR__ . "/sample.odp");