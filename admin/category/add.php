<?php
require_once ('../../db/dbhelper.php');

$id = $name = $thumbnail = $price = '';
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['thumbnail'])) {
		$thumbnail = $_POST['thumbnail'];
	}
	if (isset($_POST['price'])) {
		$price = $_POST['price'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into category(name, thumbnail, price,  created_at, updated_at) values ("'.$name.'", "'.$thumbnail.'", "'.$price.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update category set name = "'.$name.'", thumbnail = "'.$thumbnail.'" , price = "'.$price.'", updated_at = "'.$updated_at.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from category where id = '.$id;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$name = $category['name'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm/Sửa Danh Mục Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
<div class="body__container">
        <div class="body__left">
            <div class="body__left-container">
                <div class="body__left-item" style="background-color: rgb(44, 44, 44); color: #fff;">
                    <i class="ti-new-window"></i>
                    <p>Administrator</p>
                </div>
                <div class="body__left-item">
                    <i class="ti-new-window"></i>
                    <p>Administrator</p>
                </div>
                <div class="body__left-item active">
                    <i class="ti-new-window"></i>
                    <p>Quản trị danh mục</p>
                    <i class="ti-angle-down"></i>
                </div>
                <div class="body__left-item active">
                    <ul class="body__left-list">
                        <li class="body__left-product"><a class="add" href="./add.php"><i class="ti-angle-right"></i>Thêm danh mục</a></li>
                        <li class="body__left-product active"><i class="ti-angle-right"></i>Sản Phẩm</li>
                        <li class="body__left-product"><i class="ti-angle-right"></i>Bài Viết</li>
                    </ul>
                </div>
                <div class="body__left-item">
                    <i class="ti-new-window"></i>
                    <p>Administrator</p>
                    <i class="ti-angle-down"></i>
                </div>
                <div class="body__left-item">
                    <i class="ti-new-window"></i>
                    <p>Administrator</p>
                    <i class="ti-angle-down"></i>
                </div>
                <div class="body__left-item">
                    <i class="ti-new-window"></i>
                    <p>Administrator</p>
                    <i class="ti-angle-down"></i>
                </div>
                <div class="body__left-item">
                    <i class="ti-new-window"></i>
                    <p>Administrator</p>
                    <i class="ti-angle-down"></i>
                </div>
            </div>
        </div>
        <div class="body__right">
            <div class="right-container">
                <div class="body__container-right">
                    <div class="display-flex">
                        <div class="body__container-right-item">
                            <a class="body__container-right-item-link" href="#">
                                <i class="ti-arrow-left"></i>
                                <p>Vào trang web</p>
                            </a>
                        </div>
                        <div class="body__container-right-item wide">

                            <p>Liên hệ</p>
                        </div>
                        <div class="body__container-right-item wide">

                            <p>Đơn hàng</p>
                        </div>
                    </div>
                </div>
                <!-- hết dòng đầu -->
                <div class="body__container-filter">
                    <select class="button filter-button" name="" id="" value="">
                        <option value="" class="body__container-filter-item">Đẹp trai</option>
                        <option value="" class="body__container-filter-item">Xinh Gái</option>
                        <option value="" class="body__container-filter-item">Nhiều tiền</option>
                        <option value="" class="body__container-filter-item">6 Múi</option>
                    </select>
                    <input placeholder="Tìm kiếm" type="text" class=" button container__right-wwith-search">
                    <a href="./add.php" class="container__right-add-new">
                        <i class="ti-plus"></i>Thêm mới
                    </a>
                </div>
                
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Danh Mục:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>
					<div class="form-group">
					  <label for="name">Hình Ảnh:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>">
					</div>
					<div class="form-group">
					  <label for="name">Giá bán (VNĐ):</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="price" name="price" value="<?=$price?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>