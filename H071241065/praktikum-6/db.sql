-- SQL untuk membuat database dan tabel

CREATE DATABASE db_manajemen_proyek;

USE db_manajemen_proyek;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,  -- 'super_admin', 'project_manager', 'team_member'
    project_manager_id INT DEFAULT NULL,
    FOREIGN KEY (project_manager_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_proyek VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    manager_id INT NOT NULL,
    FOREIGN KEY (manager_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_tugas VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    status VARCHAR(50) DEFAULT 'belum',  -- 'belum', 'proses', 'selesai'
    project_id INT NOT NULL,
    assigned_to INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert data contoh (untuk testing)
INSERT INTO users (username, password, role) VALUES ('superadmin', 'superpass', 'super_admin');
INSERT INTO users (username, password, role) VALUES ('pm1', 'pmpass', 'project_manager');
INSERT INTO users (username, password, role, project_manager_id) VALUES ('team1', 'teampass', 'team_member', 2);  -- Assigned to pm1 (id=2)