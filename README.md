<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Youdemy - Online Learning Platform</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f9;
      color: #333;
    }
    h1, h2, h3 {
      color: #0073e6;
    }
    h1 {
      font-size: 2.5em;
      text-align: center;
    }
    h2 {
      margin-top: 20px;
      border-bottom: 2px solid #0073e6;
      padding-bottom: 5px;
    }
    ul {
      list-style: disc;
      margin-left: 20px;
    }
    pre {
      background: #333;
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      overflow-x: auto;
    }
    code {
      font-family: monospace;
      background: #f4f4f9;
      padding: 2px 5px;
      border-radius: 3px;
    }
    .badge {
      display: inline-block;
      background: #0073e6;
      color: #fff;
      padding: 2px 8px;
      border-radius: 3px;
      margin-right: 5px;
      font-size: 0.8em;
    }
    .stats {
      margin-top: 20px;
      background: #e7f3ff;
      border-left: 4px solid #0073e6;
      padding: 10px 15px;
    }
  </style>
</head>
<body>
  <h1>📚 Youdemy - Online Learning Platform</h1>
  <p>
    <span class="badge">PHP 8.0</span>
    <span class="badge">MySQL</span>
    <span class="badge">MIT License</span>
  </p>
  <p>Welcome to <strong>Youdemy</strong>, a modern and interactive platform designed to revolutionize online learning by connecting students and educators through high-quality educational content. 🚀</p>

  <h2>🌟 Features</h2>
  <h3>👥 Visitors</h3>
  <ul>
    <li>🔍 Browse courses catalog with pagination.</li>
    <li>🗂️ Search for courses by keywords.</li>
    <li>📝 Create an account and choose a role (<strong>Student</strong> or <strong>Teacher</strong>).</li>
  </ul>
  
  <h3>🎓 Students</h3>
  <ul>
    <li>📚 Explore the catalog and search for courses.</li>
    <li>🔍 View detailed course information (description, content, instructor, etc.).</li>
    <li>✅ Enroll in courses (authentication required).</li>
    <li>📖 Access the <strong>"My Courses"</strong> section to view enrolled courses.</li>
  </ul>
  
  <h3>🧑‍🏫 Teachers</h3>
  <ul>
    <li>➕ Add new courses with details such as Title, Description, Content (video/doc), Tags, and Category.</li>
    <li>🛠️ Manage courses (Edit, Delete, and View enrollments).</li>
    <li>📊 Access <strong>Statistics</strong>: Number of enrolled students per course, Total number of created courses.</li>
  </ul>
  
  <h3>🛠️ Administrators (Back Office)</h3>
  <ul>
    <li>✅ Validate teacher accounts.</li>
    <li>🧑‍💻 Manage users (Activate, Suspend, or Delete).</li>
    <li>📂 Manage content (Courses, Categories, and Tags).</li>
    <li>⚡ Bulk insert tags for efficiency.</li>
    <li>📊 View global statistics: Total number of courses, Course distribution by category, 🏆 Top 3 teachers, and the course with the most enrollments.</li>
  </ul>

  <h2>🔧 Tech Stack</h2>
  <ul>
    <li><strong>Languages:</strong> PHP 8+, SQL</li>
    <li><strong>Database:</strong> MySQL (Relational Database)</li>
    <li><strong>Authentication:</strong> Secure session management with PHP</li>
    <li><strong>Frontend:</strong> HTML, CSS, JavaScript</li>
  </ul>

  <h2>🛠️ Project Structure</h2>
  <pre><code>Youdemy/
├── index.php              # Homepage
├── auth/
│   ├── login.php          # Login page
│   ├── register.php       # Registration page
├── student/
│   ├── my_courses.php     # My courses section
│   ├── course_details.php # Course details page
├── teacher/
│   ├── add_course.php     # Add new course
│   ├── manage_courses.php # Manage courses
│   ├── stats.php          # Teacher stats
├── admin/
│   ├── validate_teachers.php # Validate teacher accounts
│   ├── manage_users.php      # Manage users
│   ├── stats.php             # Admin statistics
├── assets/                # CSS/JS/Images
└── database/
    ├── config.php         # Database configuration
    └── migrations.sql     # SQL file for tables creation
</code></pre>

  <h2>🚀 How to Install and Run</h2>
  <h3>Prerequisites</h3>
  <ul>
    <li>A local server: <strong>XAMPP, WAMP, or MAMP</strong></li>
    <li>PHP 8+</li>
    <li>MySQL 5.7+</li>
  </ul>

  <h3>Steps</h3>
  <ol>
    <li>Clone this repository:
      <pre><code>git clone https://github.com/your-username/youdemy.git
cd youdemy
</code></pre>
    </li>
    <li>Import the database:
      <ul>
        <li>Open your MySQL interface (e.g., phpMyAdmin).</li>
        <li>Import the <code>migrations.sql</code> file from the <code>database/</code> folder.</li>
      </ul>
    </li>
    <li>Update database configuration:
      <ul>
        <li>Modify <code>database/config.php</code> with your database credentials.</li>
      </ul>
    </li>
    <li>Start your local server and access the platform:
      <ul>
        <li>Homepage: <code>http://localhost/youdemy/index.php</code></li>
        <li>Admin Panel: <code>http://localhost/youdemy/admin/</code></li>
      </ul>
    </li>
  </ol>

  <h2>📊 Database Design Overview</h2>
  <p><strong>Tables</strong></p>
  <ul>
    <li><strong>Users:</strong> Stores user data (id, name, email, role).</li>
    <li><strong>Courses:</strong> Contains course details (id, title, description, content, category).</li>
    <li><strong>Tags:</strong> Holds tag information (id, name).</li>
    <li><strong>Course_Tags:</strong> Links courses and tags (course_id, tag_id).</li>
  </ul>

  <div class="stats">
    <p>Example ER Diagram: Visualize relationships between users, courses, and tags.</p>
  </div>

  <footer>
    <p>💻 Created with ❤️ by <strong>Your Name</strong></p>
  </footer>
</body>
</html>
