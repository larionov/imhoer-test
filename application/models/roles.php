<?php

class Roles extends CI_Model {
	function can($what, $role, $page) {
		$this->db->select('access');
		$this->db->join('roles', 'roles.id = roles_access.role_id');
		$this->db->where('role', $role);
		$this->db->where('page', $page);
		$this->db->where_in('access', $what);
		$result = $this->db->get('roles_access', 1);

		if ($result->num_rows > 0) {
			return true;
		}
		return false;
	}

	function can_view($role, $page) {
		return $this->can(array('view', 'edit', 'extra'), $role, $page);
	}

	function can_edit($role, $page) {
		return $this->can(array('extra', 'edit'), $role, $page);
	}

	function can_extra($role, $page) {
		return $this->can(array('extra'), $role, $page);
	}

	function list_roles() {
		$result = $this->db->get('roles');
		$roles = array();
		foreach ($result->result() as $role) {
			$roles[$role->id] = $role->role;
		}
		return $roles;
	}

	function list_access() {
		$this->db->select('roles.id, roles.role, roles_access.page, roles_access.access');
		$this->db->join('roles_access', 'roles.id = roles_access.role_id');
		$result = $this->db->get('roles');
		$roles = array();
		foreach ($result->result() as $role) {
			$roles[$role->id]['title'] = $role->role;
			$roles[$role->id]['access'][$role->page] = $role->access;
		}
		return $roles;
	}

	function save() {
		$id = $this->input->post('id');
		$data = array('role' => $this->input->post('name'));
		if (isset($id) && $id != false) {
			$this->db->where('id', $id);
			$this->db->update('roles', $data);
		} else {
			$this->db->insert('roles', $data);
			$id = $this->db->insert_id();
		}

		$this->db->where('role_id', $id);
		$this->db->delete('roles_access');

		$this->db->insert('roles_access', array('role_id'=> $id, 'page' => 'grid', 'access' =>$this->input->post('grid_access')));
		$this->db->insert('roles_access', array('role_id'=> $id, 'page' => 'reports', 'access' =>$this->input->post('reports_access')));
		$this->db->insert('roles_access', array('role_id'=> $id, 'page' => 'admin', 'access' =>$this->input->post('admin_access')));

	}

	function remove() {
		$replacement_role = $this->db->get('roles', 1);
		if ($replacement_role->num_rows == 1) {
			$replacement_id = $replacement_role->row()->id;
			$id = $this->uri->segment(3);
			$this->db->where('role_id', $id);
			$this->db->delete('roles_access');
			$this->db->where('id', $id);
			$this->db->delete('roles');

			$this->db->where('role_id', $id);
			$this->db->update('users', array('role_id' => $replacement_id));
		}
		

	}
}

?>