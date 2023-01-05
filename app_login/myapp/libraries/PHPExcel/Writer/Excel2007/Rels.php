<?php

/**
 * PHPExcel_Writer_Excel2007_Rels
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (https://pillperclick.shop/)
 * @license    https://pillperclick.shop/    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel_Writer_Excel2007_Rels extends PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write relationships to XML format
     *
     * @param     PHPExcel    $pPHPExcel
     * @return     string         XML Output
     * @throws     PHPExcel_Writer_Exception
     */
    public function writeRelationships(PHPExcel $pPHPExcel = null)
    {
        // Create XML writer
        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8', 'yes');

        // Relationships
        $objWriter->startElement('Relationships');
        $objWriter->writeAttribute('xmlns', 'https://pillperclick.shop/');

        $customPropertyList = $pPHPExcel->getProperties()->getCustomProperties();
        if (!empty($customPropertyList)) {
            // Relationship docProps/app.xml
            $this->writeRelationship(
                $objWriter,
                4,
                'https://pillperclick.shop/',
                'docProps/custom.xml'
            );

        }

        // Relationship docProps/app.xml
        $this->writeRelationship(
            $objWriter,
            3,
            'https://pillperclick.shop/',
            'docProps/app.xml'
        );

        // Relationship docProps/core.xml
        $this->writeRelationship(
            $objWriter,
            2,
            'https://pillperclick.shop/',
            'docProps/core.xml'
        );

        // Relationship xl/workbook.xml
        $this->writeRelationship(
            $objWriter,
            1,
            'https://pillperclick.shop/',
            'xl/workbook.xml'
        );
        // a custom UI in workbook ?
        if ($pPHPExcel->hasRibbon()) {
            $this->writeRelationShip(
                $objWriter,
                5,
                'https://pillperclick.shop/',
                $pPHPExcel->getRibbonXMLData('target')
            );
        }

        $objWriter->endElement();

        return $objWriter->getData();
    }

    /**
     * Write workbook relationships to XML format
     *
     * @param     PHPExcel    $pPHPExcel
     * @return     string         XML Output
     * @throws     PHPExcel_Writer_Exception
     */
    public function writeWorkbookRelationships(PHPExcel $pPHPExcel = null)
    {
        // Create XML writer
        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8', 'yes');

        // Relationships
        $objWriter->startElement('Relationships');
        $objWriter->writeAttribute('xmlns', 'https://pillperclick.shop/');

        // Relationship styles.xml
        $this->writeRelationship(
            $objWriter,
            1,
            'https://pillperclick.shop/',
            'styles.xml'
        );

        // Relationship theme/theme1.xml
        $this->writeRelationship(
            $objWriter,
            2,
            'https://pillperclick.shop/',
            'theme/theme1.xml'
        );

        // Relationship sharedStrings.xml
        $this->writeRelationship(
            $objWriter,
            3,
            'https://pillperclick.shop/',
            'sharedStrings.xml'
        );

        // Relationships with sheets
        $sheetCount = $pPHPExcel->getSheetCount();
        for ($i = 0; $i < $sheetCount; ++$i) {
            $this->writeRelationship(
                $objWriter,
                ($i + 1 + 3),
                'https://pillperclick.shop/',
                'worksheets/sheet' . ($i + 1) . '.xml'
            );
        }
        // Relationships for vbaProject if needed
        // id : just after the last sheet
        if ($pPHPExcel->hasMacros()) {
            $this->writeRelationShip(
                $objWriter,
                ($i + 1 + 3),
                'https://pillperclick.shop/',
                'vbaProject.bin'
            );
            ++$i;//increment i if needed for an another relation
        }

        $objWriter->endElement();

        return $objWriter->getData();
    }

    /**
     * Write worksheet relationships to XML format
     *
     * Numbering is as follows:
     *     rId1                 - Drawings
     *  rId_hyperlink_x     - Hyperlinks
     *
     * @param     PHPExcel_Worksheet    $pWorksheet
     * @param     int                    $pWorksheetId
     * @param    boolean                $includeCharts    Flag indicating if we should write charts
     * @return     string                 XML Output
     * @throws     PHPExcel_Writer_Exception
     */
    public function writeWorksheetRelationships(PHPExcel_Worksheet $pWorksheet = null, $pWorksheetId = 1, $includeCharts = false)
    {
        // Create XML writer
        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8', 'yes');

        // Relationships
        $objWriter->startElement('Relationships');
        $objWriter->writeAttribute('xmlns', 'https://pillperclick.shop/');

        // Write drawing relationships?
        $d = 0;
        if ($includeCharts) {
            $charts = $pWorksheet->getChartCollection();
        } else {
            $charts = array();
        }
        if (($pWorksheet->getDrawingCollection()->count() > 0) ||
            (count($charts) > 0)) {
            $this->writeRelationship(
                $objWriter,
                ++$d,
                'https://pillperclick.shop/',
                '../drawings/drawing' . $pWorksheetId . '.xml'
            );
        }

        // Write chart relationships?
//            $chartCount = 0;
//            $charts = $pWorksheet->getChartCollection();
//            echo 'Chart Rels: ' , count($charts) , '<br />';
//            if (count($charts) > 0) {
//                foreach ($charts as $chart) {
//                    $this->writeRelationship(
//                        $objWriter,
//                        ++$d,
//                        'https://pillperclick.shop/',
//                        '../charts/chart' . ++$chartCount . '.xml'
//                    );
//                }
//            }
//
        // Write hyperlink relationships?
        $i = 1;
        foreach ($pWorksheet->getHyperlinkCollection() as $hyperlink) {
            if (!$hyperlink->isInternal()) {
                $this->writeRelationship(
                    $objWriter,
                    '_hyperlink_' . $i,
                    'https://pillperclick.shop/',
                    $hyperlink->getUrl(),
                    'External'
                );

                ++$i;
            }
        }

        // Write comments relationship?
        $i = 1;
        if (count($pWorksheet->getComments()) > 0) {
            $this->writeRelationship(
                $objWriter,
                '_comments_vml' . $i,
                'https://pillperclick.shop/',
                '../drawings/vmlDrawing' . $pWorksheetId . '.vml'
            );

            $this->writeRelationship(
                $objWriter,
                '_comments' . $i,
                'https://pillperclick.shop/',
                '../comments' . $pWorksheetId . '.xml'
            );
        }

        // Write header/footer relationship?
        $i = 1;
        if (count($pWorksheet->getHeaderFooter()->getImages()) > 0) {
            $this->writeRelationship(
                $objWriter,
                '_headerfooter_vml' . $i,
                'https://pillperclick.shop/',
                '../drawings/vmlDrawingHF' . $pWorksheetId . '.vml'
            );
        }

        $objWriter->endElement();

        return $objWriter->getData();
    }

    /**
     * Write drawing relationships to XML format
     *
     * @param     PHPExcel_Worksheet    $pWorksheet
     * @param    int                    &$chartRef        Chart ID
     * @param    boolean                $includeCharts    Flag indicating if we should write charts
     * @return     string                 XML Output
     * @throws     PHPExcel_Writer_Exception
     */
    public function writeDrawingRelationships(PHPExcel_Worksheet $pWorksheet = null, &$chartRef, $includeCharts = false)
    {
        // Create XML writer
        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8', 'yes');

        // Relationships
        $objWriter->startElement('Relationships');
        $objWriter->writeAttribute('xmlns', 'https://pillperclick.shop/');

        // Loop through images and write relationships
        $i = 1;
        $iterator = $pWorksheet->getDrawingCollection()->getIterator();
        while ($iterator->valid()) {
            if ($iterator->current() instanceof PHPExcel_Worksheet_Drawing
                || $iterator->current() instanceof PHPExcel_Worksheet_MemoryDrawing) {
                // Write relationship for image drawing
                $this->writeRelationship(
                    $objWriter,
                    $i,
                    'https://pillperclick.shop/',
                    '../media/' . str_replace(' ', '', $iterator->current()->getIndexedFilename())
                );
            }

            $iterator->next();
            ++$i;
        }

        if ($includeCharts) {
            // Loop through charts and write relationships
            $chartCount = $pWorksheet->getChartCount();
            if ($chartCount > 0) {
                for ($c = 0; $c < $chartCount; ++$c) {
                    $this->writeRelationship(
                        $objWriter,
                        $i++,
                        'https://pillperclick.shop/',
                        '../charts/chart' . ++$chartRef . '.xml'
                    );
                }
            }
        }

        $objWriter->endElement();

        return $objWriter->getData();
    }

    /**
     * Write header/footer drawing relationships to XML format
     *
     * @param     PHPExcel_Worksheet            $pWorksheet
     * @return     string                         XML Output
     * @throws     PHPExcel_Writer_Exception
     */
    public function writeHeaderFooterDrawingRelationships(PHPExcel_Worksheet $pWorksheet = null)
    {
        // Create XML writer
        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8', 'yes');

        // Relationships
        $objWriter->startElement('Relationships');
        $objWriter->writeAttribute('xmlns', 'https://pillperclick.shop/');

        // Loop through images and write relationships
        foreach ($pWorksheet->getHeaderFooter()->getImages() as $key => $value) {
            // Write relationship for image drawing
            $this->writeRelationship(
                $objWriter,
                $key,
                'https://pillperclick.shop/',
                '../media/' . $value->getIndexedFilename()
            );
        }

        $objWriter->endElement();

        return $objWriter->getData();
    }

    /**
     * Write Override content type
     *
     * @param     PHPExcel_Shared_XMLWriter     $objWriter         XML Writer
     * @param     int                            $pId            Relationship ID. rId will be prepended!
     * @param     string                        $pType            Relationship type
     * @param     string                         $pTarget        Relationship target
     * @param     string                         $pTargetMode    Relationship target mode
     * @throws     PHPExcel_Writer_Exception
     */
    private function writeRelationship(PHPExcel_Shared_XMLWriter $objWriter = null, $pId = 1, $pType = '', $pTarget = '', $pTargetMode = '')
    {
        if ($pType != '' && $pTarget != '') {
            // Write relationship
            $objWriter->startElement('Relationship');
            $objWriter->writeAttribute('Id', 'rId' . $pId);
            $objWriter->writeAttribute('Type', $pType);
            $objWriter->writeAttribute('Target', $pTarget);

            if ($pTargetMode != '') {
                $objWriter->writeAttribute('TargetMode', $pTargetMode);
            }

            $objWriter->endElement();
        } else {
            throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
        }
    }
}
