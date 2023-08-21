<?php
function uploadFile($folderName, $file){
    $fileName = time().'_'.$file->getClientOriginalName();
    return $file->storeAs($folderName,$fileName, 'public');
}

?>
