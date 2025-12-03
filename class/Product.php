
<?php
class Product {
    public $id;
    public $name;
    public $category;
    public $price;
    public $stock;
    public $image_path;
    public $status;

    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setById($id) {
        $stmt = $this->db->query("SELECT * FROM products WHERE id = :id", ['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
            return true;
        }
        return false;
    }

    public function save() {
        $sql = "INSERT INTO products (name, category, price, stock, image_path, status)
                VALUES (:name, :category, :price, :stock, :image_path, :status)";
        $params = [
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'stock' => $this->stock,
            'image_path' => $this->image_path,
            'status' => $this->status
        ];
        return $this->db->query($sql, $params) !== false;
    }

    public function update() {
        $sql = "UPDATE products SET name=:name, category=:category, price=:price, stock=:stock,
                image_path=:image_path, status=:status WHERE id=:id";
        $params = [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'stock' => $this->stock,
            'image_path' => $this->image_path,
            'status' => $this->status
        ];
        return $this->db->query($sql, $params) !== false;
    }

    public function delete() {
        return $this->db->query("DELETE FROM products WHERE id=:id", ['id' => $this->id]) !== false;
    }
}
?>
