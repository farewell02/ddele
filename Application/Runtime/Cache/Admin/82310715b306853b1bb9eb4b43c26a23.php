<?php if (!defined('THINK_PATH')) exit();?>			<table class="table table-striped table-bordered table-hover center">
			<thead>
				<tr align='left' bgcolor="#ccc">
					<th>ID</th>
					<th>用户名</th>
					<th>真实姓名</th>
					<th>注册时间</th>
					<th>所属角色</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["username"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["time"]); ?></td>
					<td>
						<?php if(is_array($vo["role"])): $i = 0; $__LIST__ = $vo["role"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?><span class="text-info"><?php echo ($role['name']); ?></span>
							&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
					<td>
					<?php if($_SESSION['node']['user_delete'] == '1' ): ?><a class="btn-sm btn-danger del" data-id="<?php echo ($vo['id']); ?>"><i class="icon-trash bigger-100"></i>删除</a><?php endif; ?>
					<?php if($_SESSION['node']['user_edit'] == '1' ): ?><a class="btn-sm btn-primary edit" data-id="<?php echo ($vo['id']); ?>"><i class="icon-pencil bigger-100">修改</i></a><?php endif; ?>
					<?php if($_SESSION['node']['user_rolelist'] == '1' ): ?><a class="btn-sm btn-info auth" data-id="<?php echo ($vo['id']); ?>"><i class="icon-zoom-in bigger-100">分配角色</i></a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<td colspan="6" class="pager" id="pager"><?php echo ($page); ?>
					<?php if($_SESSION['node']['user_add'] == '1' ): ?><a class="btn-sm btn-success add" style="float:right;">
							<i class="icon-double-angle-right"></i>
							用户添加
						</a><?php endif; ?>
					</td>
				</tr>
			
			</tbody>
			
			
		</table>