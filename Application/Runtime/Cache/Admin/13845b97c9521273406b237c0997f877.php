<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
			<thead>
			 <tr>
				<th>id</th>
				<th>分类名</th>
				<th>级别</th>
				<th>path</th>
				<th>操作</th>
			 </tr>
			</thead>
			<tbody>
			<!-- <?php var_dump($list); echo $p; ?> -->
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["html"]); echo ($vo["name"]); ?></td>
					<td><?php echo ($vo['level'] + 1); ?>级分类</td>
					<td><?php echo ($vo["path"]); ?></td>
					<th>
						<?php if($_SESSION['node']['category_addson'] == '1' ): ?><a class="btn-sm btn-info addson" data-id="<?php echo ($vo['id']); ?>"><i class="icon-zoom-in bigger-100">添加子分类</i></a><?php endif; ?>
						<?php if($_SESSION['node']['category_edit'] == '1' ): ?><a class="btn-sm btn-primary edit" data-id="<?php echo ($vo['id']); ?>"><i class="icon-pencil bigger-100">修改</i></a><?php endif; ?>
						<?php if($_SESSION['node']['category_delete'] == '1' ): ?><a class="btn-sm btn-danger del" data-id="<?php echo ($vo['id']); ?>"><i class="icon-trash bigger-100">删除</i></a><?php endif; ?>
					</th>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td colspan="6" class="pager" id="pager"><?php echo ($page); ?>
				<?php if($_SESSION['node']['category_add'] == '1' ): ?><a class="btn-sm btn-success add" style="float:right;">
						<i class="icon-double-angle-right icon-plus"></i>
						添加一级分类
					</a><?php endif; ?>
				</td>
			</tr>
	</tbody>	
</table>