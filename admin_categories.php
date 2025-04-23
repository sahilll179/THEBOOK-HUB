<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['add_category'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $icon = $_POST['icon'];

    $select_product_name = mysqli_query($conn, "SELECT cat_name FROM `category` WHERE cat_name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'Category name already added';
    } else {
        $add_product_query = mysqli_query($conn, "INSERT INTO `category`( cat_icon,cat_name) VALUES('$icon','$name')") or die('query failed');

        if ($add_product_query) {
            $message[] = 'Category added successfully!';
        } else {
            $message[] = 'Category could not be added!';
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `category` WHERE cat_id = '$delete_id'") or die('query failed');
    header('location:admin_categories.php');
}



?>
<?php
include "admin/header.php";
?>

<div class="main">
    <?php
    include "admin/navbar.php";
    ?>


    <!-- Admin Categories Start -->

    <div class="container-xxl py-5" style="min-height:90vh;">
        <div class="container">
            <div class="d-flex justify-content-between wow fadeInUp" data-wow-delay="0.1s">
                <h1>CATEGORIES</h1>
                <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#add">
                    Add Category
                </button>
            </div>

            <?php
            include("admin/messages.php");
            ?>

            <div class="row mt-5">

                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_category = mysqli_query($conn, "SELECT * FROM `category`") or die('query failed');
                        while ($fetch_category = mysqli_fetch_assoc($select_category)) {
                            ?>

                            <tr>
                                <th scope="row" class="py-3">
                                    <?php echo $fetch_category['cat_id']; ?>
                                </th>

                                <td class="py-3 text-primary"></b>
                                    <?php echo $fetch_category['cat_icon']; ?>
                                </td>

                                <td class="py-3">
                                    <?php echo $fetch_category['cat_name']; ?>
                                </td>

                                <td class="py-3"><a
                                        href="admin_categories.php?delete=<?php echo $fetch_category['cat_id']; ?>"
                                        title="Delete" onclick="return confirm('Delete this Category?');"><i
                                            class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php
                        }
                        ;
                        ?>


                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST">

                        <div class="row g-3">


                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Book Name"
                                        name="name" required>
                                    <label for="name">Category Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="icon" placeholder="Author Name"
                                        name="icon" required>
                                    <label for="icon">Category Icon</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="add_category" type="submit">Add
                                    Category</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <!-- Admin Categories End -->



    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>

    <?php
    include "admin/footer.php";
    ?>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>