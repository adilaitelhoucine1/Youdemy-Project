    <?php
    require_once '../config/Connect.php';

    class Cours {
        protected $conn;
        
        public function __construct() {
            $connect = new Connect();
            $this->conn = $connect->getConnection();
        }
        
        public function afficher($enseignant_id){}
        

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

        public function getCountCourses(){
            $sql="SELECT COUNT(*) as 'count' from cours";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result['count'];
        }
        public function getCountCoursVideo(){
            $sql="SELECT COUNT(*) as 'count' from cours where content_video is not null";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result['count'];
        }
        public function getCountCoursText(){
            $sql="SELECT COUNT(*) as 'count' from cours where content_Text is not null";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result['count'];
        }
    } 
    //  $cours = new Cours();
    //  echo $cours->getCountCourses();