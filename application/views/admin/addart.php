<div class="content">
        <div class="header" style="margin:0;">
            
            <h1 class="page-title">添加文章</h1>
                    <ul class="breadcrumb">
            <li><?php echo anchor('admin/home', 'Home'); ?></li>
            <li class="active"><?php echo anchor('admin/art/index', $this->uri->segment(2, 0)); ?></li>
            <li class="active"><?php echo $this->uri->segment(3, 0); ?></li>
        </ul>

        </div>
<div class="main-content">
<div class="row">
  <div class="col-md-4">
    <br>
    <?php echo form_open('admin/art/addart', array('id'=>'tab')); ?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width: 100%;">
		<div class="form-group">
            <label>分类</label>
            <select name="cid" id="cid" class="form-control">
				<option value="" <?php echo set_select('cid', 'one', TRUE); ?> >请选择分类</option>
				<?php 
					foreach($options as $key=>$val){
						echo "<option value='$key' >".$val."</option>";
					}
				?>
			</select>
			<?php echo '<font style="color:red;">'.form_error('cid').'</font>'; ?>
        </div>

        <div class="form-group">
	        <label>标题</label>
	        <?php echo form_input(array('name'=>'title', 'value'=>set_value('title'), 'class'=>'form-control')); ?>
			<?php echo '<font style="color:red;">'.form_error('title').'</font>'; ?>
        </div>
		
        <div class="form-group">
			<label>内容</label>
			<?php echo form_textarea('content','','id="myEditor" '); ?>
        </div>
      </div>
    </div>

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
    </form>
      <a href="<?php echo site_url().'/admin/art'; ?>" data-toggle="modal" class="btn btn-danger">取消</a>
    </div>
  </div>
</div>

<script type="text/javascript">
var ue = new UE.ui.Editor({initialFrameHeight:500,initialFrameWidth:800 });
ue.render('myEditor'); //myEditor为id值
</script>