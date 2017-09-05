
<?php
function xmlGenerator($cota, $autor1nume, $autor1prenume, $autor2nume, $autor2prenume, $autor3nume, $autor3prenume, $titlu, $info_titlu, $loc, $editura, $an, $desc, $path) {
    /* create a dom document with encoding utf8 */
    $domtree = new DOMDocument('1.0', 'UTF-8');
    $domtree->formatOutput = true;

    /* create the root element of the xml tree */
    $file = $domtree->createElement("file");
    /* append it to the document created */
    $file = $domtree->appendChild($file);

    $record = $domtree->createElement("record");
    $record = $file->appendChild($record);

    // create attribute node
	$attr1 = $domtree->createAttribute("xmlns:xsi");
    $attr1->value = "http://www.w3.org/2001/XMLSchema-instance";
	$record->appendChild($attr1);

    $attr1 = $domtree->createAttribute("xsi:schemaLocation");
    $attr1->value = "http://www.loc.gov/MARC21/slim http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd";
    $record->appendChild($attr1);

    $attr1 = $domtree->createAttribute("xmlns");
    $attr1->value = "http://www.loc.gov/MARC21/slim";
    $record->appendChild($attr1);

	// create attribute value node
	//$attr1value = $domtree->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
	//$record->appendChild($attr1value);

    /* you should enclose the following two lines in a cicle */

    $record->appendChild($domtree->createElement('leader', '-----nam--22--------450-'));

    $ctrfield = $domtree->createElement("controlfield", "b 000 und d");
    $record->appendChild($ctrfield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "008";
    $ctrfield->appendChild($attr1);

    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "010";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", " ");
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);

    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "090";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $cota);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "200";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = "1";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $titlu);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);

    $subfield = $domtree->createElement("subfield", $info_titlu);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "e";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "205";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", "Editie");
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "210";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $loc);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);

    $subfield = $domtree->createElement("subfield", $editura);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "c";
    $subfield->appendChild($attr1);

    $subfield = $domtree->createElement("subfield", $an);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "d";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "215";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", "Paginatie");
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "300";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $desc);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "675";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", "Clasificare zecimala");
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "700";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = "1";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $autor1nume);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);

    $subfield = $domtree->createElement("subfield", $autor1prenume);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "b";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "701";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = "1";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $autor2nume);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);

    $subfield = $domtree->createElement("subfield", $autor2prenume);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "b";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "701";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = "1";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $subfield = $domtree->createElement("subfield", $autor3nume);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "a";
    $subfield->appendChild($attr1);

    $subfield = $domtree->createElement("subfield", $autor3prenume);
    $datafield->appendChild($subfield);
    $attr1 = $domtree->createAttribute("code");
    $attr1->value = "b";
    $subfield->appendChild($attr1);


    $datafield = $domtree->createElement("datafield", "CTV");
    $record->appendChild($datafield);
    $attr1 = $domtree->createAttribute("tag");
    $attr1->value = "BAS";
    $datafield->appendChild($attr1);
    $attr2 = $domtree->createAttribute("ind2");
    $attr2->value = " ";
    $datafield->appendChild($attr2);
    $attr3 = $domtree->createAttribute("ind1");
    $attr3->value = " ";
    $datafield->appendChild($attr3);

    $arr = explode(".jp", $path);
    $xmlFile = $arr[0] . ".xml";
	$strxml = $domtree->saveXML();
	$domtree->save($xmlFile);
}
?>
