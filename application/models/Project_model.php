<?
class Project_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	//======================================================================
	//	Gets all projects from database
	//	method: 	getAllProjects()
	//	@return 	object
	//======================================================================
	public function getAllProjects()
	{
		$sql = $this->db->query("SELECT a.id, a.name, a.project_type, a.description, a.start_date, a.due_date, a.status, b.username as created_by, a.parent_project_id 
FROM project a, user b WHERE a.created_by = b.id");
		if($sql->num_rows() == 0)
			return false;

		return $sql->result();
	}

	private function hasSubProjects($project_id)
	{
		$sql = $this->db->query("SELECT id FROM project WHERE parent_project_id = '{$project_id}'");
		if($sql->num_rows() == 0)
			return false;
		return true;
	}

	//======================================================================
	//	Groups projects into parents & children
	//	method: 	groupProjects()
	//	@return 	array
	//======================================================================
	public function groupProjects($data)
	{
		//echo "<pre>".print_r($data, true)."</pre>";
		if($data)
		{
			$projects = array();
			foreach($data as $idx => $project)
			{

				// Is project a parent project?
				if($project->parent_project_id == 0)
				{
					// Does this parent project have children?
					if($this->hasSubProjects($project->id))
						$projects[$project->id][$project->id] = $project;
					else
						$projects[$project->id] = $project;
				}

				// This project is a child project
				else
					$projects[$project->parent_project_id][] = $project;
				// {
				// 	// Does this child project have children?
				// 	if($this->hasSubProjects($project->id))
				// 		$projects[$project->parent_project_id][$project->id][] = $project;
				// 	else
				// 		$projects[$project->parent_project_id][$project->id] = $project;
				// }
					
			}
			//echo "<pre>".print_r($projects, true)."</pre>";
			return $projects;
		}
		else
			return false;
	}

	//======================================================================
	//	Gets a project by given $project_id
	//	method: 	getProjectById()
	//	@param 		(int) $project_id
	//	@return 	object
	//======================================================================
	public function getProjectById($project_id)
	{
		$sql = $this->db->get_where('project', array('id' => $project_id));
		if($sql->num_rows() !== 1)
			return false;
		else
		{
			$project = $sql->result();
			return $project;
		}
	}

	//======================================================================
	//	Gets project name given $project_id
	//	method: 	getProjectName()
	//	@return 	string
	//======================================================================
	public function getProjectName($project_id)
	{
		$project = $this->getProjectById($project_id);
		if(!empty($project))
			$project = (array) $project[0];
		else
			return;

		return $project['name'];
	}

	//======================================================================
	//	Inserts new project into DB
	//	method: 	insertProject()
	//	@param 		(array) $data
	//	@return 	boolean
	//======================================================================
	public function insertProject($data)
	{
		unset($data['add']);
		if($this->db->insert('project', $data))
			return true;
		return false;
	}

	//======================================================================
	//	Gets table columns from given $table
	//	method: 	getTableCols()
	//	@param 		(string) $table
	//	@return 	array
	//======================================================================
	public function getTableCols($table = 'project')
	{
		$columns = $this->db->list_fields($table);
		foreach($columns as $col)
		{
			if($col == 'id')
				continue;
			$new_cols[] = ucwords(str_replace('_', ' ', $col));
		}

		return $new_cols;
	}

	//======================================================================
	//	Updates project in DB
	//	method: 	updateProject()
	//	@param 		(array) $data
	//	@return 	boolean
	//======================================================================
	public function updateProject($data)
	{
		if(!$data)
			redirect('home');
		
		unset($data['update']);
		if($this->db->update('project', $data, array('id' => $data['id'])))
			return true;
		return false;
	}

	//======================================================================
	//	Deletes project from DB
	//	method: 	deleteProject()
	//	@param 		(int) $id
	//	@return 	boolean
	//======================================================================
	public function deleteProject($id)
	{
		//Check if this project has open children projects
		if($this->hasOpenSubProjects($id))
			return false;
		if($this->db->delete('project', array('id' => $id)))
			return true;

		return false;
	}

	//======================================================================
	//	Gets all parent projects
	//	method: 	getParentProjects()
	//	@return 	object
	//======================================================================
	public function getParentProjects()
	{
		$sql = $this->db->query("SELECT id, name FROM project");
		return $sql->result();
	}

	//======================================================================
	//	Checks if given $project_id
	//	method: 	hasOpenSubProjects()
	//	@param 		(int) $project_id
	//	@return 	boolean
	//======================================================================
	private function hasOpenSubProjects($project_id)
	{
		$sql = $this->db->query("SELECT id, status FROM project WHERE parent_project_id = '{$project_id}'");
		if($sql->num_rows() == 0)
			return false;
		else
		{
			foreach($sql->result() as $result)
			if($result->status == 'Open')
				return true;

			return false;
		}
		return false;
	}

	//======================================================================
	//	Bulids html table rows for project
	//	method: 	htmlTableHelper()
	//	@param 		(array) $array
	//	@return 	$html string
	//======================================================================
	public function htmlTableHelper($array)
	{
		$html = "";
		$html .= "<tr>";
		foreach($array as $k => $v)
		{
			if($k == "id")
				$pkey = $v;
			elseif($k == "parent_project_id")
			{
				$parent_project = $this->getProjectName($v);
				$html .= "<td>{$parent_project}</td>";
			}
			else
				$html .= "<td>{$v}</td>";

			if($k == "created_by")
				$this_user = $v;
		}
		if($this_user == $this->session->userdata('username'))
			$html .= "
			<td><a href='".base_url('home/read')."/".$pkey."'>Read</a></td>
			<td><a href='".base_url('home/edit')."/".$pkey."'>Edit</a></td>
			<td><a class='delete_action' href='".base_url('home/delete')."/".$pkey."'>Delete</a></td>";
		else
			$html .= "<td colspan='3'></td>";

		$html .= "</tr>";
		return $html;
	}

}