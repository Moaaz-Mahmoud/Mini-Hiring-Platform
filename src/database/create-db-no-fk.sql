CREATE DATABASE IF NOT EXISTS hiring_platform;

CREATE TABLE hiring_managers(
    id int,
    name text,
    candidate_id int,
    position_id int,
    
    PRIMARY KEY (id)
);

CREATE TABLE hiring_managers_accounts(
    id int,
    user_name text,
    encrypted_password text,
    hiring_manager_id int,
    
    PRIMARY KEY (id)
);

CREATE TABLE candidates(
    id int,
    name text,
    hiring_manager_id int,
    assessment_id int,
    
    PRIMARY KEY (id)
);

CREATE TABLE candidates_accounts(
    id int,
    user_name text,
    encrypted_password text,
    candidate_id int,
    
    PRIMARY KEY (id)
);

CREATE TABLE positions(
    id int,
    name text,
    description text,
    assessment_id int,
    
    PRIMARY KEY(id)
);

CREATE TABLE assessments(
    id int,
    position_id int,
    difficulty ENUM('entry', 'intermediate', 'expert'),
    hiring_manager_id int,
    candidate_id int,
    score int,
    
    PRIMARY KEY(id)
);


