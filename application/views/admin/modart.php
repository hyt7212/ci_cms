<div class="content">
        <div class="header" style="margin:0;">
            
            <h1 class="page-title">修改文章</h1>
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
    <?php echo form_open('admin/art/modart', array('id'=>'tab')); ?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width: 100%;">
		<div class="form-group">
            <label>分类</label>
            <select name="cid" id="cid" class="form-control">
				<option value="" >请选择分类</option>
				<?php
					foreach($options as $key=>$val){
						if($art['cid'] == $key){
							$selected = 'selected';
						}else{
							$selected = '';
						}
						echo "<option value='$key' ".$selected." >".$val."</option>";
					}
				?>
			</select>
			<?php echo '<font style="color:red;">'.form_error('cid').'</font>'; ?>
        </div>
		<input type="hidden" name="id" value="<?php echo ($art['id']) ?>">
        <div class="form-group">
	        <label>标题</label>
	        <?php echo form_input(array('name'=>'title', 'value'=>$art['title'], 'class'=>'form-control')); ?>
			<?php echo '<font style="color:red;">'.form_error('title').'</font>'; ?>
        </div>
		
        <div class="form-group">
			<label>内容</label>
			<?php echo form_textarea('content', $art['content'], 'id="myEditor" '); ?>
        </div>
      </div>
    </div>

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 修改</button>
    </form>
      <a href="<?php echo site_url().'/admin/art'; ?>" data-toggle="modal" class="btn btn-danger">取消</a>
    </div>
  </div>
</div>

<script type="text/javascript">
var ue = new UE.ui.Editor({initialFrameHeight:500,initialFrameWidth:800 });
ue.render('myEditor'); //myEditor为id值
</script>