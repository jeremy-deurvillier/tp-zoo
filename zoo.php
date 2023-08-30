<?php

require_once('./config/autoload.php');
require_once('./utils/functions.php');

$title = 'Game';

include_once('includes/header.php');

// Navbar & Sidebar
include_once('includes/navbar.php');
include_once('includes/main-sidebar.php');

// Forms
include_once('includes/forms/change-zoo-name.php');

// Others sections
include_once('includes/others/contact.php');
include_once('includes/others/about.php');
?>

<script>
function datasNotification()
{
    return {
        'zooNameChanged': <?= json_encode(changeZooName()); ?>
    };
}
</script>

<?php

include_once('includes/footer.php');

?>
