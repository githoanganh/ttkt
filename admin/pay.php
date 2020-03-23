<script>
    function delItem(name) {
        return confirm('bạn muốn xóa tài khoản: ' + name + ' ?');
    }
</script>


<?php
if (!defined('SECURITY')) {
    die('BẠN KHÔNG CÓ QUYỀN');
}
?>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Gán số sản phẩm hiển thị trên 1 trang
$rows_per_page = 5;
// Công thức
$per_row = $page * $rows_per_page - $rows_per_page;

// Truy vấn ( tính toán số bản ghi )
$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM money"));
$total_pages = ceil($total_rows / $rows_per_page); // hàm làm tròn số
// Nút preview
$list_pages = '';
$page_prev = $page - 1;
if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=leader&page=' . $page_prev . '">&laquo;</a></li>';
// Tính toán số trang
for ($i = 1; $i <= $total_pages; $i++) {

    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=leader&page=' . $i . '">' . $i . '</a></li>';
}
// Nút next
$page_next = $page + 1;
if ($page_next > $total_pages) {
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=leader&page=' . $page_next . '">&raquo;</a></li>';
$user_id = $_SESSION['user_id'];
echo $user_id;
$sql = "SELECT user_mail,user_full FROM user WHERE user_id = '$user_id' ";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$dbuser_full = isset($row['user_full']) ? $row['user_full'] : null;
$dbuser_mail = isset($row['user_mail']) ? $row['user_mail'] : null;
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <?php 
            if(!defined('SECURITY'))
                {
	                die('BẠN KHÔNG CÓ QUYỀN');
                }
            if(isset($_POST['sbm'])) {
     
                $money_id = $_SESSION['user_id'] ;
                $money_date = $_POST['money_date'];
                $money_start = $_POST['money_start'];
                $money_end = $_POST['money_end'];
                $money_total = $_POST['money_total'];
                $money_effective = $_POST['money_effective'];
                $money_project = $_POST['money_project'];
                $money_task = $_POST['money_task'];
                $sql = "INSERT INTO money(user_id,money_date,money_start,money_end,money_total,money_effective,money_project,money_task)
                        VALUES('$money_id','$money_date', '$money_start', '$money_end','$money_total','$money_effective','$money_project','$money_task') ";
                $query = mysqli_query($conn,$sql);
                header('location:index.php?page_layout=money');
                }
        ?>
        <div class="col-lg-12">
            <div class="panel-body">
				<div class="panel panel-default">
                    <div class="panel-body">
                        <?php 
                            $sql = " SELECT * from user where user_level = 3 ";
                            $query = mysqli_query($conn,$sql);
                        ?>
                        <form  action="index.php?page_layout=pay" method="GET">   
                            <h3>Tên nhân viên</h3>
                            <input type="hidden" name="page_layout" value="pay"/>
                            <select name="user_id"  >
                                <option value="">- All -</option>
                                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <option value=" <?php echo $row['user_id']; ?>" 
                                        <?php (isset($_GET['user_id']) and $_GET['user_id'] == $row['user_id']) ? 'selected="selected"' : '' ?>>
                                        <?php echo $row['user_full']; ?>
                                        </option>
                                    <?php } ?>
                            </select>
                            <button type="submit" class="btn btn-primary" >Gửi</button>
                        </form>  
                        <table data-toolbar="#toolbar" data-toggle="table">
						    <thead>     
						        <tr>
                                    <td>
                                        <th  data-sortable="true">ID</th>
                                        <th  data-sortable="true">Full name</th>
                                        <!-- <th  data-sortable="true">Start time</th>
                                        <th  data-sortable="true">End time</th>
                                        <th  data-sortable="true">Total hours</th>
                                        <th  data-sortable="true">Effective(Self)</th>
                                        <th  data-sortable="true">Project</th>
                                        <th  data-sortable="true">Task Descript</th>
                                        <th  data-sortable="true">Approved</th>
                                        <th  data-sortable="true">Effective(PM)</th> -->
                                        <th  data-sortable="true">Total Money</th>
                                        <!-- <th  data-sortable="true"></th> -->
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $total = 0;
                                    $name = null;
                                    if(isset($_GET['user_id'])) {

                                        $name = $_GET['user_id'];
                                    }
                                    $sql = "SELECT * FROM `money` join user on user.user_id = money.user_id ";
                                    if ($name != null) {
                                        $sql .= " where money.user_id = '$name'";
                                    }
                                    $sql .= " ORDER BY money.money_id ASC LIMIT $per_row,$rows_per_page";
                                    $query = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($query)){
                                    $total = $total + $row['money_money'];

                                
                                ?>
                                <tr>
                                    <td ><?php echo $row['money_id']?></td>
                                    <td ><?php echo $row['user_full']?></td>
                                    <!-- <td ><?php echo $row['money_start']?></td>
                                    <td ><?php echo $row['money_end']?></td>
                                    <td ><?php echo $row['money_total']?></td>
                                    <td ><?php echo $row['money_effective']?></td>
                                    <td ><?php echo $row['money_project']?></td>
                                    <td ><?php echo $row['money_task']?></td>
                                    <td ><?php echo $row['money_approved']?></td>
                                    <td ><?php echo $row['money_effectivepm']?></td> -->
                                    <td ><?php echo $row['money_money']?></td>
                                    <!-- <td class="form-group">
                                        <a href="index.php?page_layout=edit_leader&user_id=<?php echo $row['money_id']; ?>" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div style="margin-top:15px">                
                            <label>Tổng lương</label>
                            <input type="text" name="total" value="<?php echo $total; ?>"  />
                            <a href="" class="btn btn-primary">In ra
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php 
                                echo $list_pages;
                                ?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
        </div>	
