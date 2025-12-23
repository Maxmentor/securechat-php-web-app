
/* =========================================
   ROOMS TABLE
   ========================================= */
CREATE TABLE rooms (
  id INT AUTO_INCREMENT PRIMARY KEY,
  room_id VARCHAR(10) NOT NULL UNIQUE,
  room_name VARCHAR(255) NOT NULL,
  room_password VARCHAR(255) DEFAULT NULL,
  room_type ENUM('public','private') NOT NULL,
  created_by VARCHAR(50) NOT NULL,
  created_at DATETIME NOT NULL
);


/* =========================================
   CHAT MESSAGES TABLE (PLAIN TEXT)
   ========================================= */
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  room_id VARCHAR(10),
  username VARCHAR(50),
  message TEXT,
  image VARCHAR(255),
  created_at DATETIME
);



CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);





/* =========================================
   USERS TABLE
   ========================================= */
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
