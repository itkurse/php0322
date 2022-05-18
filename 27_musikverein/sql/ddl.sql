CREATE TABLE skill 
(
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE user
(
    id INT AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(100) NOT NULL,
    birthdate DATE NOT NULL,
    is_admin TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY (email)
);

CREATE TABLE user_skill 
(
    skill_id INT,
    user_id  INT,
    PRIMARY KEY (skill_id, user_id),
    CONSTRAINT fk_user_skill_skill_id FOREIGN KEY (skill_id) REFERENCES skill(id),
    CONSTRAINT fk_user_skill_user_id FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE event_type 
(
    id INT AUTO_INCREMENT,
    name VARCHAR (50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE event 
(
    id INT AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    date_and_time DATETIME NOT NULL,
    eventtype_id INT NOT NULL,
    img_filename VARCHAR(1000) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_event_eventtype_id FOREIGN KEY (eventtype_id) REFERENCES event_type(id)
);

CREATE TABLE participation 
(
    user_id INT,
    event_id INT,
    PRIMARY KEY (user_id, event_id),
    CONSTRAINT fk_participation_user_id FOREIGN KEY (user_id) REFERENCES user(id),
    CONSTRAINT fk_participation_event_id FOREIGN KEY (event_id) REFERENCES event(id)
);

