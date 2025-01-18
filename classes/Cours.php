    <?php
    require_once '../config/Connect.php';

    class Cours {
        protected $conn;
        
        public function __construct() {
            $connect = new Connect();
            $this->conn = $connect->getConnection();
        }
        
        public function afficher($enseignant_id){
            $sql="SELECT * FROM cours c join categorie cat ON c.id_category=cat.id_category
            join utilisateur u on u.user_id=c.enseignant_id
             WHERE c.course_id= ? ";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$enseignant_id]);
            return  $stmt->fetchAll();
        }
        public function Ajouter($titre, $description, $enseignant_id, $id_category, $contenu, $tags){}
        

        protected function getTags($course_id) {
            $sql = "SELECT t.* FROM tags t 
                    JOIN courstag ct ON t.id_tag = ct.id_tag 
                    WHERE ct.course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            return $stmt->fetchAll();
        }
        public function deleteCourse($course_id){
            $sql ="DELETE from cours where course_id = ?";
            $stmt=$this->conn->prepare($sql);
            $stmt=$stmt->execute([$course_id]);
        }
        public function getTitle($course_id) {
            $sql = "SELECT titre FROM cours WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            $result = $stmt->fetch();     
            return $result['titre'];
        }
    
        public function updateCourse($course_id, $title, $description, $category_id) {
            $sql = "UPDATE cours 
                    SET titre = ?, description = ?, id_category = ? 
                    WHERE course_id = ?";
            
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$title, $description, $category_id, $course_id]);
        }

        public function updateCourseTags($course_id, $tags) {
            $sql = "DELETE FROM courstag WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            
            if (is_array($tags) && !empty($tags)) {
                $sql = "INSERT INTO courstag (course_id, id_tag) VALUES (?, ?)";
                $stmt = $this->conn->prepare($sql);
                
                foreach ($tags as $tag) {
                    if (is_numeric($tag)) {
                        $stmt->execute([$course_id, $tag]);
                    }
                }
            }
            return true;
        }

        public function getDescription($course_id) {
            $sql = "SELECT description FROM cours WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            $result = $stmt->fetch();
            return $result['description'];
        }

        public function getCategoryId($course_id) {
            $sql = "SELECT id_category FROM cours WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            $result = $stmt->fetch();
            return $result['id_category'];
        }

        public function getCourseTags($course_id) {
            $sql = "SELECT id_tag FROM courstag WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            return $stmt->fetchAll();
        }

        public function getContent($course_id) {
            $sql = "SELECT content_text FROM cours WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            $result = $stmt->fetch();
            return $result ? $result['content_text'] : '';
        }

        public function getVideoUrl($course_id) {
            $sql = "SELECT content_video FROM cours WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            $result = $stmt->fetch();
            return $result ? $result['content_video'] : '';
        }

        public function updateContent($course_id, $content) {
            $sql = "UPDATE cours SET content_text = ? WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$content, $course_id]);
        }

        public function updateVideoUrl($course_id, $video_url) {
            $sql = "UPDATE cours SET content_video = ? WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$video_url, $course_id]);
        }
        public function GettypeCourse($course_id) {
            $sql = "SELECT content_video,content_text FROM cours WHERE course_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$course_id]);
            $result = $stmt->fetch();
            if(!empty($result['content_video'])){
                return "video";
            }else{
                return "text";
            }
        }

        public function getCountCourses($enseignant_id){
            $sql="SELECT COUNT(*) as 'count' from cours where enseignant_id = ?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$enseignant_id]);
            $result=$stmt->fetch();
            return $result['count'];
        }
        public function getCountCoursVideo($enseignant_id){
            $sql="SELECT COUNT(*) as 'count' from cours where content_video is not null and enseignant_id = ?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$enseignant_id]);
            $result=$stmt->fetch();
            return $result['count'];
        }
        public function getCountCoursText($enseignant_id){
            $sql="SELECT COUNT(*) as 'count' from cours where content_Text is not null and enseignant_id = ?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$enseignant_id]);
            $result=$stmt->fetch();
            return $result['count'];
        }
        public function getAllCourses() {
            $sql = "SELECT * FROM cours c JOIN utilisateur u on c.enseignant_id=u.user_id 
            join categorie  cat on cat.id_category=c.id_category";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

    } 
    //    $cours = new Cours();
    //    print_r( $cours->afficher(16));