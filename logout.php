<?php
include('components/head_links.php');
include('components/header.php');
include('components/footer.php');
session_start();
session_destroy();
?>
<script>

    sessionStorage.clear();
    var changePage = document.createElement("a");
    changePage.href = "login.php";
    document.body.appendChild(changePage);
    changePage.click();

</script>
<?php
include('components/foot_links.php');
?>