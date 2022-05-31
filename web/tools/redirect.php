<?php

class redirect {

    public static function redirectPage($pageName) {
        ?>
        <script language="Javascript">
            <!--
                 document.location.replace("index.php?page=<?php echo $pageName; ?>");
            // -->
        </script>
        <?php
    }

}
