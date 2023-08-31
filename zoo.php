<?php

require_once('./config/autoload.php');
require_once('./utils/functions.php');

$zooNameChanged = changeZooName();
$addEmployee = addEmployee();
$updateEmployee = updateEmployee();
$deleteEmployee = deleteEmployee();

$title = 'Game';

include_once('includes/header.php');

// Navbar & Sidebar
include_once('includes/navbar.php');
include_once('includes/main-sidebar.php');

// Sections
if (isset($_GET['update'])) {
    if ($_GET['update'] === 'user') include_once('includes/forms/update-employee.php');
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
        'deleteEmployee': <?= json_encode($deleteEmployee); ?>
    };
}
</script>

<?php

include_once('includes/footer.php');

?>
