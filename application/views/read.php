<div class="container">

<? if(isset($this->data->project)) : unset($this->data->project[0]->id); unset($this->data->project[0]->created_by);?>

<? 
	$project_parents = array(0 => "This is the parent project");
	foreach($this->data->parent_projects as $project)
	{
		$project_parents[$project->id] = $project->name;
	}
?>

	<h1>View <?=$this->data->project_name;?></h1>
	<table class="table table-striped table-bordered table-hover">
		<? foreach($this->data->project[0] as $label => $input) : ?>
		<tr>
			<td><?=ucwords(str_replace('_',' ', $label))?></td>
			<? if($label == 'parent_project_id') : ?>
				<td><?=$this->project_model->getProjectName($input)?></td>
			<? else : ?>
				<td><?=$input?></td>
			<? endif; ?>
		</tr>
		<? endforeach; ?>
	</table>
	
	<a class="btn btn-default" href="<?=base_url()?>" role="button">Back to all projects</a>

<? else : ?>
	
	<?=isset($this->data->message)?'<br><br><div role="alert" class="alert alert-danger"><strong>'.$this->data->message.'</strong></div>':""?>

<? endif;?>


</div>