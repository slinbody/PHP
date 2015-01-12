<?php
//測試PHP是否有寫入檔案權限
 $dir = '/var/log/myDir';

 if ( !file_exists($dir) ) {
  mkdir ($dir, 0744);
 }

 file_put_contents ($dir.'/test.txt', 'Hello File');
?>
