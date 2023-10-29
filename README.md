# System_room_for_rent

CREATE TABLE tbl_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adm_name VARCHAR(50) NOT NULL,
    adm_password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
);
