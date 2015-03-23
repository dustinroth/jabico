<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth->require_login();
		$this->load->model('project_model');
	}

	public function index()
	{
		if(!$this->data->projects = $this->project_model->groupProjects($this->project_model->getAllProjects()))
			$this->data->error_message = "No projects to display. Please create a new project.";
		$this->data->table_cols = $this->project_model->getTableCols('project');
		$this->_output_view($this->data, 'home');
	}

	public function add()
	{
		if(!$this->input->post())
		{
			$this->data->fields = $this->db->list_fields('project');
			$this->data->parent_projects = $this->project_model->getParentProjects();
			$this->_output_view($this->data, 'add');
		}
		else
		{
			if($this->project_model->insertProject($this->input->post()))
			{
				$this->data->success_message = "Project has been successfully added.";
				$this->index();
			}
			else
			{
				$this->data->error_message = "There was an error adding this project. Please try again.";
				$this->index();
			}
		}
	}
	
	public function read($id = null)
	{
		if(!$id)
			redirect('home');
		else
		{
			if($this->project_model->getProjectById($id))
			{
				$this->data->project = $this->project_model->getProjectById($id);
				$this->data->parent_projects = $this->project_model->getParentProjects();
				$this->data->project_name = $this->data->project[0]->name;
			}
			else
				$this->data->message = "Invalid project selected. <a href='".base_url('home')."'>Return Home.</a>";

			$this->_output_view($this->data, 'read');
		}
	}

	public function edit($id = null)
	{
		if(!$id)
			redirect('home');
		else
		{
			if($this->project_model->getProjectById($id))
			{
				$this->data->project = $this->project_model->getProjectById($id);
				$this->data->parent_projects = $this->project_model->getParentProjects();
				$this->data->project_name = $this->data->project[0]->name;
			}
			else
				$this->data->message = "Invalid project selected. <a href='".base_url('home')."'>Return Home.</a>";

			$this->_output_view($this->data, 'edit');
		}
			
	}

	public function update($id = null)
	{
		if(!$id || !$this->project_model->getProjectById($id))
		{
			$this->data->error_message = "There was an error updating this project. Please try again.";
			$this->index();
		}
		else
		{
			if($this->project_model->updateProject($this->input->post()))
			{
				$this->data->success_message = "Project has been successfully updated.";
				$this->index();
			}
			else
			{
				$this->data->error_message = "There was an error updating this project. Please try again.";
				$this->index();
			}
		}
	}

	public function delete($id = null)
	{
		if(!$id)
			redirect('home');
		elseif($this->project_model->deleteProject($id))
		{
			$this->data->success_message = "Project has been deleted successfully.";
			$this->index();
		}
		else
		{
			$this->data->error_message = "There was an error deleting this project. Please check if this project has open sub projects before deleting.";
			$this->index();
		}
			
	}
}
