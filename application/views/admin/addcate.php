<div class="content">
        <div class="header" style="margin:0;">
            
            <h1 class="page-title">添加分类</h1>
                    <ul class="breadcrumb">
            <li><?php echo anchor('admin/home', 'Home'); ?></li>
            <li class="active"><?php echo anchor('admin/cate/index', $this->uri->segment(2, 0)); ?></li>
            <li class="active"><?php echo $this->uri->segment(3, 0); ?></li>
        </ul>

        </div>
<div class="main-content">
<div class="row">
  <div class="col-md-4">
    <br>
    <?php echo form_open('admin/cate/addcate', array('id'=>'tab')); ?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <div class="form-group">
        <label>分类名称</label>
        <input type="text" name="name" value="" class="form-control">
        </div>
      </div>
    </div>

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
    </form>
      <a href="<?php echo site_url().'/admin/cate'; ?>" data-toggle="modal" class="btn btn-danger">取消</a>
    </div>
  </div>
</div>