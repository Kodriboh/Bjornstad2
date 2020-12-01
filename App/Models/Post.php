<?php 

namespace App\Models;

use PDO;
use PDOException;

class Post extends \Core\Model
{

    /**
     * Get all the posts as an assoc array
     * 
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();

            $stmt = $db->query('
                SELECT id, title, content
                FROM posts
                ORDER BY created_at
            ');
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}