/* =========================================
   DATABASE : CRICKMAX
   ========================================= */


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


/* =========================================
   ADMIN SETTINGS TABLE
   ========================================= */
CREATE TABLE admin_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  brand_name VARCHAR(100) NOT NULL,
  footer_text VARCHAR(255) NOT NULL,

  btn1_text VARCHAR(50) DEFAULT NULL,
  btn1_url  VARCHAR(255) DEFAULT NULL,

  btn2_text VARCHAR(50) DEFAULT NULL,
  btn2_url  VARCHAR(255) DEFAULT NULL,

  btn3_text VARCHAR(50) DEFAULT NULL,
  btn3_url  VARCHAR(255) DEFAULT NULL,

  btn4_text VARCHAR(50) DEFAULT NULL,
  btn4_url  VARCHAR(255) DEFAULT NULL
);



CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



/* =========================================
   DEFAULT ADMIN ROW
   ========================================= */
INSERT INTO admin_settings
(

)
VALUES
(
  'CrickMax',
  '© 2025 CrickMax. All Rights Reserved',
  NULL, NULL,
  NULL, NULL,
  NULL, NULL,
  NULL, NULL
);


/* =========================================
   USERS TABLE
   ========================================= */
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
