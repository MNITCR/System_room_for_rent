# System_room_for_rent


CREATE TABLE tbl_user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    adm_name VARCHAR(50) NOT NULL,
    adm_password VARCHAR(50) NOT NULL,
    img_path VARCHAR(100) NOT NULL,
    uniqcode VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE tbl_img (
    img_id INT AUTO_INCREMENT PRIMARY KEY,
    img_pathSlid VARCHAR(100) NOT NULL,
    title_slide VARCHAR(50) NOT NULL,
    detail_slide VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE vip_content (
    vip_id INT AUTO_INCREMENT PRIMARY KEY,
    vip_title VARCHAR(50),
    vip_title_detail TEXT,
    vip_price_dollar DECIMAL(10, 2),
    vip_size_width INT,
    vip_size_length INT,
    vip_room_water INT,
    vip_room_wc INT,
    vip_building VARCHAR(50),
    vip_floor INT,
    vip_pathImg VARCHAR(250)
);


CREATE TABLE vip_img (
    img_id INT AUTO_INCREMENT PRIMARY KEY,
    img_title VARCHAR(50),
    vip_content_id INT,
    image_path VARCHAR(255),
    FOREIGN KEY (vip_content_id) REFERENCES vip_content(vip_id) ON DELETE CASCADE
);
