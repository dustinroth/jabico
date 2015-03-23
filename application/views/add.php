<div class="container">

<? 
	$project_parents = array(0 => "This is the parent project");
	foreach($this->data->parent_projects as $project)
	{
		$project_parents[$project->id] = $project->name;
	}
?>
	<h2>Add New Project </h2>
	<h3>{{project.name}}</h3>
	<?
		$form = "";
		foreach ($this->data->fields as $field)
		{
		   $form .= "<div class='row form-group'><div class='col-xs-4'>";
		   switch($field)
		   {
		   	case 'id':
		   		$form .= form_hidden($field, '', 'class="form-control"');
		   		break;
		   	case 'name':
				$form .= form_label(ucwords(str_replace('_',' ', $field)));
				$form .= form_input($field, '', "class='form-control' id='{$field}' ng-model='project.name'");
				break;
		   	case 'description':
		   		$form .= form_label(ucwords(str_replace('_',' ', $field)));
				$form .= form_textarea($field, '', "class='form-control' id='{$field}'");
				break;
			case 'project_type':
				$options = array('Internal' => 'Internal', 'External' => 'External');
				$form .= form_label(ucwords(str_replace('_',' ', $field)));
				$form .= form_dropdown($field, $options, '', "class='form-control' id='{$field}'");
				break;
			case 'status':
				$options = array('Open' => 'Open', 'Closed' => 'Closed');
				$form .= form_label(ucwords(str_replace('_',' ', $field)));
				$form .= form_dropdown($field, $options, '', "class='form-control' id='{$field}'");
				break;
			case 'created_by':
		   		$form .= form_hidden($field, $this->session->userdata('user_id'), 'class="form-control"');
		   		break;
		   	case 'parent_project_id':
				$form .= form_label(ucwords(str_replace('_',' ', $field)));
				$form .= form_dropdown($field, $project_parents, '', "class='form-control' id='{$field}'");
		   		break;
			default:
				$form .= form_label(ucwords(str_replace('_',' ', $field)));
				$form .= form_input($field, '', "class='form-control' id='{$field}'");
				break;
		   }
			$form .= "</div></div>";
		} 
		//$form .= "<div class='row form-group'><div class='col-xs-4'>".form_upload('file')."</div></div>";
	?>

	<?=form_open()?>
		<?=$form?>
		<?=form_submit('add','Add','class="btn btn-success"');?>
	<?=form_close()?>

</div>