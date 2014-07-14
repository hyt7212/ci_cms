		<div class="content">
        <div class="header">
            
            <h1 class="page-title">文章管理</h1>
                    <ul class="breadcrumb">
            <li><?php echo anchor('admin/home', 'Home'); ?></li>
            <li class="active"><?php echo $this->uri->segment(2, 0); ?></li>
        </ul>

        </div>
        <div class="main-content">
            
<div class="btn-toolbar list-toolbar">
    <a href="<?php echo site_url('admin/art/addart'); ?>"><button class="btn btn-primary"><i class="fa fa-plus"></i> 添加文章</button></a>
  <div class="btn-group">
  </div>
</div>
<table class="table" >
  <thead>
    <tr>
      <th>#</th>
      <th>文章名称</th>
      <th>发布时间</th>
      <th>分类</th>
      <th>点击量</th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arts as $art): ?>
    <tr>
      <td style="width: 50px;"><?php echo $art['id'] ?></td>
      <td style="width: 300px;"><?php echo mb_substr($art['title'], 0, 15) ?></td>
      <td><?php echo mdate('%Y-%m-%d - %H:%i:%s',$art['ptime']) ?></td>
      <td><?php echo $art['name'] ?></td>
      <td><?php echo $art['click'] ?></td>
      <td>
          <a href="<?php echo site_url('admin/art/modart').'/'.$art['id']; ?>" title="编辑"><i class="fa fa-pencil"></i></a>&nbsp;
          <a href="#myModal" onclick="dodel(<?php echo $art['id'] ?>)" role="button" data-toggle="modal" title="删除"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php echo $this->pagination->create_links(); ?>

<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">确认删除</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="fa fa-warning modal-icon"></i>你确定要删除吗？</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>
            <!-- <button class="btn btn-danger" data-dismiss="modal">删除</button> -->
            <a href='#' class="btn btn-danger">删除</a>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    function dodel(id){
      $(".btn-danger").attr('href','<?php echo site_url() ?>/admin/art/delart/'+id);
    }
</script>