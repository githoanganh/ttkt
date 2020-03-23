<script>
function delItem(name)
{
return confirm('bạn muốn xóa tài khoản: '+name+' ?');
}
</script>
<?php
if(!defined('SECURITY'))
{
	die('BẠN KHÔNG CÓ QUYỀN');
}
?>
<?php 
if(isset($_GET['page'])){

$page = $_GET['page'];

}else{
    $page = 1;
}
// Gán số sản phẩm hiển thị trên 1 trang
$rows_per_page = 5;
// Công thức
$per_row = $page*$rows_per_page - $rows_per_page;

// Truy vấn ( tính toán số bản ghi )
$total_rows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM money"));
$total_pages = ceil($total_rows/$rows_per_page); // hàm làm tròn số
// Nút preview
$list_pages = '';
$page_prev = $page - 1 ;
if($page_prev <= 0){
        $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=money&page='.$page_prev.'">&laquo;</a></li>';
// Tính toán số trang
for($i=1; $i <= $total_pages; $i++){

if($i == $page){
    $active = 'active';
}else{
    $active = '';
}
$list_pages .='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=money&page='.$i.'">'.$i.'</a></li>';
}
// Nút next
$page_next = $page + 1 ;
if($page_next > $total_pages){
    $page_next = $total_pages ;
}
$list_pages .='<li class="page-item"><a class="page-link" href="index.php?page_layout=money&page='.$page_next.'">&raquo;</a></li>';
$user_id = $_SESSION['user_id'] ;
// echo $user_id;
$sql = "SELECT user_mail,user_full FROM user WHERE user_id = '$user_id' " ;
		$query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query,MYSQLI_BOTH);
        $dbuser_full = isset($row['user_full'])? $row['user_full'] : null ;
        $dbuser_mail = isset($row['user_mail'])? $row['user_mail'] : null ;
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Thông tin nhân viên</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" >
                <div class="card-body" >
                    <h4 class="card-title"><?php echo $dbuser_full ; ?></h4>
                    <p class="card-text">
                    <p>Chuc vu: Nhân viên </p>
                    <p>Mail: <?php echo $dbuser_mail; ?></p>
                    </p>
                </div>
            </div>
        </div>
        <?php 
            if (!defined('SECURITY'))
            {
                die('BẠN KHÔNG CÓ QUYỀN');
            }
            if (isset($_POST['sbm']))
            {
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
                // chuyển hướng về product
                header('location:index.php?page_layout=money');
        } ?>
        <div class="col-lg-12">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal" style="border-style: dashed; background:yellow; margin-bottom:10px" >Chấm công</button>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <form  method="post" style="background: white">    
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo $dbuser_full ; ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <label>Date</label>
                            <input name="money_date" required  class="form-control">
                            <label>Start Time</label>
                            <input name="money_start" required   class="form-control">
                            <label>End Time</label>
                            <input name="money_end" required   class="form-control">
                            <label>Total hours</label>
                            <input name="money_total" required  class="form-control">
                            <label>Effective(Self-assessment)</label>
                            <input name="money_effective" required  class="form-control">
                            <label>Project</label>
                            <input name="money_project" required   class="form-control">                                
                            <label>Task Descript</label>
                            <input name="money_task" required  class="form-control">
                            <button name="sbm" type="submit" class="btn btn-success">Gửi</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>   
                            <h2>Lịch sử chấm công</h2>
                            <tr>
                                <th  data-sortable="true">ID</th>
                                <th  data-sortable="true">Date</th>
                                <th  data-sortable="true">Start time</th>
                                <th  data-sortable="true">End time</th>
                                <th  data-sortable="true">Total hours</th>
                                <th  data-sortable="true">Effective(Self)</th>
                                <th  data-sortable="true">Project</th>
                                <th  data-sortable="true">Task Descript</th>
                                <th  data-sortable="true">Approved</th>
                                <th  data-sortable="true">Effective(PM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM user join `money` on `user`.`user_id` = `money`.`user_id` 
                            where `money`.user_id = '$user_id' ORDER BY money_id ASC LIMIT $per_row,$rows_per_page ";
                            $query = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr>
                                <td ><?php echo $row['money_id']?></td>
                                <td ><?php echo $row['money_date']?></td>
                                <td ><?php echo $row['money_start']?></td>
                                <td ><?php echo $row['money_end']?></td>
                                <td ><?php echo $row['money_total']?></td>
                                <td ><?php echo $row['money_effective']?></td>
                                <td ><?php echo $row['money_project']?></td>
                                <td ><?php echo $row['money_task']?></td>
                                <td ><?php echo $row['money_approved']?></td>
                                <td ><?php echo $row['money_effectivepm']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
</div>