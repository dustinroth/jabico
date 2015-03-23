<div class="container">

<!-- <pre><?=print_r($this->data->projects, true);?></pre> -->
	<h1>Current Projects</h1>
	<a href="<?=base_url('home/add')?>" type="button" class="btn btn-success">Add New Project</a>
	<br><br>
	<?=isset($this->data->error_message) ? '<div role="alert" class="alert alert-danger">'.$this->data->error_message.'</div>' : "" ?>
	<?=isset($this->data->success_message) ? '<div role="alert" class="alert alert-success">'.$this->data->success_message.'</div>' : "" ?>
	
	<? 
		if(!empty($this->data->projects))
		{
			$table_data = "";
			foreach($this->data->projects as $project_id => $projectArray)
			{
				if(is_array($projectArray))
					foreach($projectArray as $project)
						$table_data .= $this->project_model->htmlTableHelper($project);
				else
					$table_data .= $this->project_model->htmlTableHelper($projectArray);
			}
		}
	?>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<td><?=implode('</td><td>', $this->data->table_cols)?></strong></td>
				<td colspan="3">Actions</td>
			</tr>
		</thead>
		<tbody>
			<?=isset($table_data) ? $table_data : ""?>
		</tbody>
	</table>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <p>You are about to delete this record, this procedure is irreversible.</p>
        <p>Do you want to proceed?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
  </div>
</div>