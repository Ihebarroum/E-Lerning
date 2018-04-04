<?php 
include('Traitement/connex_bdd.php');
?>
<?php

 /* Function: download with resume/speed/stream options */


         /* List of File Types */
        function fileTypes($extension){
            $fileTypes['pdf'] = 'application/pdf';
          
            $fileTypes['zip'] = 'application/zip';
            $fileTypes['doc'] = 'application/msword';
            $fileTypes['rar'] = 'application/rar';

           
            return $fileTypes[$extention];
        };

        /*
          Parameters: downloadFile(File Location, File Name,
          max speed, is streaming
          If streaming - videos will show as videos, images as images
          instead of download prompt
         */

        function downloadFile($fileLocation, $fileName, $maxSpeed = 100, $doStream = false) {
            if (connection_status() != 0)
                return(false);
        //    in some old versions this can be pereferable to get extention
        //    $extension = strtolower(end(explode('.', $fileName)));
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            $contentType = fileTypes($extension);
            header("Cache-Control: public");
            header("Content-Transfer-Encoding: binary\n");
            header('Content-Type: $contentType');

            $contentDisposition = 'attachment';

            if ($doStream == true) {
                /* extensions to stream */
                $array_listen = array('zip', 'pdf', 'rar', 'doc');
                if (in_array($extension, $array_listen)) {
                    $contentDisposition = 'inline';
                }
            }

            if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
                $fileName = preg_replace('/\./', '%2e', $fileName, substr_count($fileName, '.') - 1);
                header("Content-Disposition: $contentDisposition;
                    filename=\"$fileName\"");
            } else {
                header("Content-Disposition: $contentDisposition;
                    filename=\"$fileName\"");
            }

            header("Accept-Ranges: bytes");
            $range = 0;
            $size = filesize($fileLocation);

            if (isset($_SERVER['HTTP_RANGE'])) {
                list($a, $range) = explode("=", $_SERVER['HTTP_RANGE']);
                str_replace($range, "-", $range);
                $size2 = $size - 1;
                $new_length = $size - $range;
                header("HTTP/1.1 206 Partial Content");
                header("Content-Length: $new_length");
                header("Content-Range: bytes $range$size2/$size");
            } else {
                $size2 = $size - 1;
                header("Content-Range: bytes 0-$size2/$size");
                header("Content-Length: " . $size);
            }

            if ($size == 0) {
                die('Zero byte file! Aborting download');
            }
            set_magic_quotes_runtime(0);
            $fp = fopen("$fileLocation", "rb");

            fseek($fp, $range);

            while (!feof($fp) and ( connection_status() == 0)) {
                set_time_limit(0);
                print(fread($fp, 1024 * $maxSpeed));
                flush();
                ob_flush();
                sleep(1);
            }
            fclose($fp);

            return((connection_status() == 0) and ! connection_aborted());
        }

        /* Implementation */
        // downloadFile('path_to_file/1.mp3', '1.mp3', 1024, false);