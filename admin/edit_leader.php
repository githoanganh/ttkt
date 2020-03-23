<?php 
    $money_id = $_GET['money_id'];
    $sql = "SELECT * FROM money join user on `money`.user_id = user.user_id WHERE money.money_id = '$money_id' ";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    if (isset($_POST['sbm'])) {
        $approved = $_POST['money_approved'];
        $effective = $_POST['money_effectivepm'];
        $money = ($effective / 100)* $row['money_total']*30000;
        // $user_id = $_GET['user_id'];
        $sql = "UPDATE money
                SET money_approved = '$approved',
                money_effectivepm = '$effective',
                money_money= '$money'
                WHERE money_id = $money_id ";
        $query = mysqli_query($conn,$sql);
         header('location:index.php?page_layout=leader');
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="">Kiểm định chấm công</a></li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $row['user_full'];?></h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Approved by PM</label>
                                <input name="money_approved" required   class="form-control">
                                <label>Effective(PM-assessment)</label>
                                <input name="money_effectivepm" required class="form-control">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		