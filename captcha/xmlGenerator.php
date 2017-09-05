<?php

            /* create a dom document with encoding utf8 */
            $domtree = new DOMDocument('1.0', 'UTF-8');
           // we want a nice output
            $domtree->formatOutput = true;

            /* create the root element of the xml tree */
            $file = $domtree->createElement("file");
            /* append it to the document created */
            $file = $domtree->appendChild($file);

            $record = $domtree->createElement("record");
            $recordAttribute = $domtree->createAttribute("xmlns:xsi");
            $recordAttribute->value = "http://www.w3.org/2001/XMLSchema-instance";
            $record->appendChild($recordAttribute);
            $file->appendChild($record);

            $recordAttribute = $domtree->createAttribute("xsi:schemaLocation");
            $recordAttribute->value = "http://www.loc.gov/MARC21/slim http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd";
            $record->appendChild($recordAttribute);
            $file->appendChild($record);

            $recordAttribute = $domtree->createAttribute("xmlns");
            $recordAttribute->value = "http://www.loc.gov/MARC21/slim";
            $record->appendChild($recordAttribute);
            $file->appendChild($record);

           $domtree->save("test1.xml");
?>