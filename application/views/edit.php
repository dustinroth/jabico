<div class="container">

<? if(isset($this->data->project)) : ?>

<? 
	$project_parents = array(0 => "This is the parent project");
	foreach($this->data->parent_projects as $project)
	{
		$project_parents[$project->id] = $project->name;
	}
?>

	<h1>Edit <?=$this->data->project_name;?></h1>
	
	<? 
		$form = "";
		foreach ($this->data->project[0] as $label => $input)
		{
		   $form .= "<div class='row form-group'><div class='col-xs-4'>";
		   switch($label)
		   {
		   	case 'id':
		   		$form .= form_hidden($label, $input, 'class="form-control"');
		   		break;
		   	case 'description':
		   		$form .= form_label(ucwords(str_replace('_',' ', $label)));
				$form .= form_textarea($label, $input, "class='form-control' id='{$label}'");
				break;
			case 'project_type':
				$options = array('Internal' => 'Internal', 'External' => 'External');
				$form .= form_label(ucwords(str_replace('_',' ', $label)));
				$form .= form_dropdown($label, $options, $input, "class='form-control' id='{$label}'");
				break;
			case 'status':
				$options = array('Open' => 'Open', 'Closed' => 'Closed');
				$form .= form_label(ucwords(str_replace('_',' ', $label)));
				$form .= form_dropdown($label, $options, $input, "class='form-control' id='{$label}'");
				break;
			case 'created_by':
		   		$form .= form_hidden($label, $input, 'class="form-control"');
		   		break;
		   	case 'parent_project_id':
				$form .= form_label(ucwords(str_replace('_',' ', $label)));
				$form .= form_dropdown($label, $project_parents, $input, "class='form-control' id='{$label}'");
		   		break;
			default:
				$form .= form_label(ucwords(str_replace('_',' ', $label)));
				$form .= form_input($label, $input, "class='form-control' id='{$label}'");
				break;
		   }
			$form .= "</div></div>";
		} 
	?>

	<?=form_open('home/update/'.$this->uri->segment(3))?>
		<?=$form?>
		<a class="btn btn-default" href="<?=base_url()?>" role="button">Back to all projects</a>
		<?=form_submit('update','Update','class="btn btn-success"');?>
	<?=form_close()?>
<? else : ?>
	
	<?=isset($this->data->message)?'<br><br><div role="alert" class="alert alert-danger"><strong>'.$this->data->message.'</strong></div>':""?>

<? endif;?>


</div>