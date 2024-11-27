<?php
class BeritaController {
    private $db;
    private $table_name = "beritas";

    public function __construct($db) {
        $this->db = $db;
    }

    // Get all beritas
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE deleted_at IS NULL";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $beritas = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($beritas, $row);
        }
        
        response(200, $beritas);
    }

    // Get single berita
    public function getOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE berita_id = ? AND deleted_at IS NULL";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        
        $berita = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($berita) {
            response(200, $berita);
        } else {
            response(404, array("message" => "Berita not found"));
        }
    }

    // Create berita
    public function create() {
        $data = json_decode(file_get_contents("php://input"));
        
        if (!isset($data->judul) || !isset($data->konten) || !isset($data->user_id)) {
            response(400, array("message" => "Missing required fields"));
            return;
        }

        $query = "INSERT INTO " . $this->table_name . " 
                 (judul, slug, konten, status, user_id, created_at) 
                 VALUES (?, ?, ?, ?, ?, NOW())";
                 
        $slug = strtolower(str_replace(' ', '-', $data->judul));
        
        try {
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute([
                $data->judul,
                $slug,
                $data->konten,
                $data->status ?? 'draft',
                $data->user_id
            ]);
            
            if ($result) {
                response(201, array("message" => "Berita created successfully"));
            } else {
                response(500, array("message" => "Failed to create berita"));
            }
        } catch (PDOException $e) {
            response(500, array("message" => "Database error: " . $e->getMessage()));
        }
    }

    // Update berita
    public function update($id) {
        $data = json_decode(file_get_contents("php://input"));
        
        if (!$data) {
            response(400, array("message" => "No data provided"));
            return;
        }

        $query = "UPDATE " . $this->table_name . " SET ";
        $params = array();
        
        if (isset($data->judul)) {
            $query .= "judul = ?, slug = ?, ";
            array_push($params, $data->judul, strtolower(str_replace(' ', '-', $data->judul)));
        }
        if (isset($data->konten)) {
            $query .= "konten = ?, ";
            array_push($params, $data->konten);
        }
        if (isset($data->status)) {
            $query .= "status = ?, ";
            array_push($params, $data->status);
        }
        
        $query .= "updated_at = NOW() WHERE berita_id = ? AND deleted_at IS NULL";
        array_push($params, $id);

        try {
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute($params);
            
            if ($result) {
                response(200, array("message" => "Berita updated successfully"));
            } else {
                response(500, array("message" => "Failed to update berita"));
            }
        } catch (PDOException $e) {
            response(500, array("message" => "Database error: " . $e->getMessage()));
        }
    }

    // Delete berita (soft delete)
    public function delete($id) {
        $query = "UPDATE " . $this->table_name . " SET deleted_at = NOW() WHERE berita_id = ?";
        
        try {
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute([$id]);
            
            if ($result) {
                response(200, array("message" => "Berita deleted successfully"));
            } else {
                response(500, array("message" => "Failed to delete berita"));
            }
        } catch (PDOException $e) {
            response(500, array("message" => "Database error: " . $e->getMessage()));
        }
    }
} 