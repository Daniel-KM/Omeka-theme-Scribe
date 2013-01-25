<?php
    
    // not using items/browse in this theme so just redirecting to collections/browse
    // look at application/views/scripts/items/browse.php for ideas if you want to browse items
    $redirect_url =  'http://'.$_SERVER['HTTP_HOST'] . '/' . basename(getcwd()) . '/collections/browse/';
    printf("<script>location.href='".$redirect_url."'</script>");

?>
