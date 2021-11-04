<?php

require_once "./mvc/pdfparser/src/Smalot/PdfParser/Parser.php";
class readPdfModel
{
    function readFilePdf()
    {
            // Store the file name into variable
            $file = './uploads/123.pdf';
            $filename = './uploads/123.pdf';

            // Header content type
            header('Content-type: application/pdf');

            header('Content-Disposition: inline; filename="' . $filename . '"');

            header('Content-Transfer-Encoding: binary');

            header('Accept-Ranges: bytes');

            // Read the file
            @readfile($file);
    }
    function read_docx($document)
    {
        $content = '';
        $zip = zip_open($document);
        if (!$zip || is_numeric($zip)) return false;
        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
            if (zip_entry_name($zip_entry) != 'word/document.xml') continue;
            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            zip_entry_close($zip_entry);
        }
        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', ' ', $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $content = preg_replace('/<w:fldData xml:space="preserve">.*<\/w:fldData>/Ums', '', $content);

        return strip_tags($content);
    }
}
?>