<?php
require_once ('../../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../themify-icons/themify-icons.css">
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
                <div class="body__container-table">
                    <table class="table__container">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá sản Phẩm</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
		//Lay danh sach danh muc tu database
		$sql          = 'select * from category';
		$categoryList = executeResult($sql);

		$index = 1;
		foreach ($categoryList as $item) {
		echo '<tr>
					<td style="text-align: center;">'.($index++).'</td>
					<td style="text-align: center;">'.$item['name'].'</td>
					<td style="text-align: center;"><img style="width: 200px; height: 100px; object-fit: cover;" src="'.$item['thumbnail'].'" alt=""></td>
					<td style="text-align: center;">'.$item['price'].'</td>
					<td style="text-align: center;">
					<a style="text-align: center;" href="add.php?id='.$item['id'].'"><button class="btn btn-warning"><i class="ti-settings"></i> Sửa</button></a>
					</td>
					<td style="text-align: center;">
						<button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')"><i class="ti-dropbox-alt"></i> Xoá</button>
					</td>
				</tr>';
		}
		?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Chắc chắn muốn xoá không bạn ơi?!!')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>

</html>