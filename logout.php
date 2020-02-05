<?php
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page destroys the current session and redirects the user to index.php
 */
    session_start();
    session_unset();
    session_destroy();
?>

<script>//redirects user home after logging out
            var redirect = setInterval(() => 
            {
                location.href='../index.php';
                
            }, 10);
</script>
