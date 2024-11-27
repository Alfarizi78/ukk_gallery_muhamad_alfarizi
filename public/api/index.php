<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path_parts = explode('/', trim($path, '/'));
$resource = isset($path_parts[2]) ? $path_parts[2] : '';
$id = isset($path_parts[3]) ? $path_parts[3] : null;

function response($status_code, $data) {
    http_response_code($status_code);
    echo json_encode($data);
}

// Handle root endpoint
if (empty($resource)) {
    if ($request_method === 'GET') {
        try {
            $data = array();
            
            // Get beritas
            $query = "SELECT * FROM beritas WHERE deleted_at IS NULL";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['beritas'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get agendas
            $query = "SELECT * FROM agendas WHERE deleted_at IS NULL";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['agendas'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get albums
            $query = "SELECT * FROM albums";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['albums'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get photos
            $query = "SELECT * FROM photos";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['photos'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get events
            $query = "SELECT * FROM events";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['events'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get kategori
            $query = "SELECT * FROM kategori";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['kategori'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get users (excluding sensitive info)
            $query = "SELECT id, name, email, role, avatar, created_at, updated_at FROM users";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['users'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get visitors count
            $query = "SELECT COUNT(*) as total_visitors FROM visitors";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data['visitors_count'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_visitors'];
            
            response(200, $data);
        } catch (PDOException $e) {
            response(500, array("message" => "Database error: " . $e->getMessage()));
        }
    } else {
        response(405, array("message" => "Method not allowed for root endpoint"));
    }
}

// Handle beritas endpoints
else if ($resource === 'beritas') {
    include_once 'controllers/BeritaController.php';
    $controller = new BeritaController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle agendas endpoints
else if ($resource === 'agendas') {
    include_once 'controllers/AgendaController.php';
    $controller = new AgendaController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle albums endpoints
else if ($resource === 'albums') {
    include_once 'controllers/AlbumController.php';
    $controller = new AlbumController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle photos endpoints
else if ($resource === 'photos') {
    include_once 'controllers/PhotoController.php';
    $controller = new PhotoController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle events endpoints
else if ($resource === 'events') {
    include_once 'controllers/EventController.php';
    $controller = new EventController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle kategori endpoints
else if ($resource === 'kategori') {
    include_once 'controllers/KategoriController.php';
    $controller = new KategoriController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle users endpoints
else if ($resource === 'users') {
    include_once 'controllers/UserController.php';
    $controller = new UserController($db);
    handleRequest($controller, $request_method, $id);
}

// Handle visitors endpoints
else if ($resource === 'visitors') {
    include_once 'controllers/VisitorController.php';
    $controller = new VisitorController($db);
    handleRequest($controller, $request_method, $id);
}

else {
    response(404, array("message" => "Resource not found"));
}

// Helper function to handle CRUD requests
function handleRequest($controller, $method, $id) {
    switch($method) {
        case 'GET':
            if ($id) {
                $controller->getOne($id);
            } else {
                $controller->getAll();
            }
            break;
            
        case 'POST':
            $controller->create();
            break;
            
        case 'PUT':
            if ($id) {
                $controller->update($id);
            } else {
                response(400, array("message" => "ID is required"));
            }
            break;
            
        case 'DELETE':
            if ($id) {
                $controller->delete($id);
            } else {
                response(400, array("message" => "ID is required"));
            }
            break;
            
        default:
            response(405, array("message" => "Method not allowed"));
            break;
    }
}
