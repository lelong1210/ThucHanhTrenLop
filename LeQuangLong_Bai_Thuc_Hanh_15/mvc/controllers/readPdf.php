<?php
class readPdf extends controller
{
    function show($params)
    {
        $this->call_view("readFileView");
    }
    function readFilePdf($params,$params1){
            // Store the file name into variable
            // $file = $link;
            // $filename = $link;

            // // Header content type
            // header('Content-type: application/pdf');

            // header('Content-Disposition: inline; filename="' . $filename . '"');

            // header('Content-Transfer-Encoding: binary');

            // header('Accept-Ranges: bytes');

            // // Read the file
            // @readfile($file);      
            echo "<iframe name='myiframe' id='myiframe' src='http://localhost:8080/www/".$params."/".$params1."' style='width:600px; height:100%; '>";  
    }
    function read($params,$params1){
        echo $this->read_docx($params."/".$params1);
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