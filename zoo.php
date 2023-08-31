<?php

require_once('./config/autoload.php');
require_once('./utils/functions.php');

$zooNameChanged = changeZooName();
$addEmployee = addEmployee();
$updateEmployee = updateEmployee();
$deleteEmployee = deleteEmployee();
$addEnclosure = addEnclosure();

$title = 'Game';

include_once('includes/header.php');

// Navbar & Sidebar
include_once('includes/navbar.php');
include_once('includes/main-sidebar.php');

// Sections
if (count($_GET) === 0) {
    include('includes/main.php');
} else {
    if (isset($_GET['update'])) {
        if ($_GET['update'] === 'user') include_once('includes/forms/update-employee.php');
    }

    if (isset($_GET['enclosure'])) {
        include('includes/main.php');
        //include_once('includes/forms/update-enclosure.php');
    }
}

// Modals
include_once('includes/employees-list.php');

// Forms
include_once('includes/forms/change-zoo-name.php');
include_once('includes/forms/add-employee.php');

// Others sections
include_once('includes/others/contact.php');
include_once('includes/others/about.php');
?>

<script>
function datasNotification()
{
    return {
        'zooNameChanged': <?= json_encode($zooNameChanged); ?>,
        'addEmployee': <?= json_encode($addEmployee); ?>,
        'updateEmployee': <?= json_encode($updateEmployee); ?>,
        'deleteEmployee': <?= json_encode($deleteEmployee); ?>,
        'addEnclosure': <?= json_encode($addEnclosure); ?>
    };
}
</script>

<?php

include_once('includes/footer.php');

?>
