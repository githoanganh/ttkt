<?php 
    if (!defined('SECURITY'))
    {
        die('BẠN KHÔNG CÓ QUYỀN');
    }
    if (isset($_POST['sbm'])) {
        $money_id = $_POST['money_id']; 
        $money_date = $_POST['money_date'];
        $money_start = $_POST['money_start'];
        $money_end = $_POST['money_end'];
        $money_total = $_POST['money_total'];
        $money_effective = $_POST['money_effective'];
        $money_project = $_POST['money_project'];
        $money_task = $_POST['money_task'];
        $money_approved = $_POST['money_approved'];
        $money_effectivepm = $_POST['money_effectivepm'];
        $sql = "INSERT INTO money(money_date,money_start,money_end,money_total,money_effective,money_project,money_task,money_approved,money_effectivepm)
            VALUES('$money_date', '$money_start', '$money_end','$money_total','$money_effective','$money_project','$money_task','$money_approved','$money_effectivepm') where ";
        $query = mysqli_query($conn,$sql);
            header('location:index.php?page_layout=money');
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="">Lịch sử chấm công</a></li>
            <li class="active">Chấm công</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chấm công</h1>
        </div>.
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Date</label>
                                <input name="money_date" required  class="form-control">
                            </div>                       
                            <div class="form-group">
                                <label>Start Time</label>
                                <input name="money_start" required   class="form-control">
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input name="money_end" required   class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total hours</label>
                                <input name="money_total" required  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Effective(Self-assessment)</label>
                                <input name="money_effective" required  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Project</label>
                                <input name="money_project" required   class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Task Descript</label>
                                <input name="money_task" required  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Approved by PM</label>
                                <input name="money_approved" required   class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Effective(PM-assessment)</label>
                                <input name="money_effectivepm" required class="form-control">
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>	<!--/.main-->	