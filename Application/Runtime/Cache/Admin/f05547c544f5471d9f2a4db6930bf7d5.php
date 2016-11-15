<?php if (!defined('THINK_PATH')) exit();?><center>
		<table class="table table-striped table-bordered table-hover center">
			<tr align='left' bgcolor="#ccc">
				<th>ID</th>
				<th>节点名称</th>
				<th>模块名（控制器）</th>
				<th>操作</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["mname"]); ?></td>
					<td><?php echo ($vo["aname"]); ?></td>
					<td><?php if($vo["status"] == 1): ?>启用<?php else: ?>禁用<?php endif; ?></td>
					<td>
						<?php if($_SESSION['node']['node_delete'] == '1' ): ?><a class="btn-sm btn-danger del" data-id="<?php echo ($vo['id']); ?>"><i class="icon-trash bigger-100">删除</i></a><?php endif; ?>
						<?php if($_SESSION['node']['node_edit'] == '1' ): ?><a class="btn-sm btn-primary edit" data-id="<?php echo ($vo['id']); ?>"><i class="icon-pencil bigger-100"></i>修改</a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
				<td colspan="6" class="pager" id="pager"><?php echo ($page); ?>
				<?php if($_SESSION['node']['node_add'] == '1' ): ?><a class="btn-sm btn-success add" style="float:right;">
						<i class="icon-double-angle-right icon-plus"></i>
						节点添加
					</a><?php endif; ?>
				</td>
				</tr>
		</table>
</center>