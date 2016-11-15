<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover center">
			<tr align='left' bgcolor="#ccc">
				<th>ID</th>
				<th>角色名</th>
				<th>说明</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["remark"]); ?></td>
					<td><?php if($vo["status"] == 1): ?>启用<?php else: ?>禁用<?php endif; ?>
					</td>
					<td class="editbuttion">
						<?php if($_SESSION['node']['role_delete'] == '1' ): ?><a class="btn-sm btn-danger del" data-id="<?php echo ($vo['id']); ?>"><i class="icon-trash bigger-100">删除</i></a><?php endif; ?>
						<?php if($_SESSION['node']['role_edit'] == '1' ): ?><a class="btn-sm btn-primary edit" data-id="<?php echo ($vo['id']); ?>"><i class="icon-pencil bigger-100"></i>修改</a><?php endif; ?>
						<?php if($_SESSION['node']['role_nodelist'] == '1' ): ?><a class="btn-sm btn-info auth" data-id="<?php echo ($vo['id']); ?>"><i class="icon-zoom-in bigger-100">分配权限</i></a>
						<!-- <a class="btn-sm btn-info auth" data-id="<?php echo ($vo['id']); ?>" href="<?php echo U('Role/nodelist',array('id'=>$vo['id']));?>"><i class="icon-zoom-in bigger-130"></i>分配权限</a> --><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td colspan="6" class="pager" id="pager"><?php echo ($page); ?>
				<?php if($_SESSION['node']['role_add'] == '1' ): ?><a class="btn-sm btn-success add" style="float:right;">
						<i class="icon-double-angle-right icon-plus"></i>
						角色添加
					</a><?php endif; ?>
				</td>
			</tr>
</table>