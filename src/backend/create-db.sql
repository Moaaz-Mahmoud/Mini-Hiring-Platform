DROP DATABASE IF EXISTS hiring_platform;
CREATE DATABASE hiring_platform;

-- Create the tables and identify the primary keys (no other constraints)
CREATE TABLE hiring_managers(
    id int,
    name text,
	candidate_id int,
	template_id int,
	scenario_id int,
    
    PRIMARY KEY (id)
);
CREATE TABLE hiring_managers_accounts(
	id int,
	user_name text,
	encrypted_password text,
	hiring_manager_id int,
	
    PRIMARY KEY(id)
);
CREATE TABLE candidates(
	id int,
	name text,

	PRIMARY KEY(id)
);
CREATE TABLE candidates_accounts(
	id int,
	user_name text,
	encrypted_password text,
	candidate_id int,

	PRIMARY KEY(id)
);
CREATE TABLE templates(
	id int,
	name text,
	difficulty ENUM("entry_level", "intermediate_level", "expert_level"),
	scenario_id int,

	PRIMARY KEY(id)
);
CREATE TABLE scenarios(
	id int,
	name text,
	used_language text,
	problem_prompt text,
	solution text,

	PRIMARY KEY(id)
);
CREATE TABLE invitations(
	id int,
	hiring_manager_id int,
	candidate_id int,
	template_id int,
    invitation_status ENUM("sent", "finished"),

	PRIMARY KEY(id)
);

-- Add a dummy entry to every table
INSERT INTO hiring_managers(id, name, candidate_id, template_id, scenario_id)
VALUES(1, 'a', 1, 1, 1);
INSERT INTO hiring_managers_accounts(id, user_name, encrypted_password, hiring_manager_id)
VALUES(1, 'a', 'a', 1);
INSERT INTO candidates(id, name)
VALUES(1, 'a');
INSERT INTO candidates_accounts(id, user_name, encrypted_password, candidate_id)
VALUES(1, 'a', 'a', 1);
INSERT INTO templates(id, name, difficulty, scenario_id)
VALUES(1, 'a', 'entry_level', 1);
INSERT INTO scenarios(id, name, used_language, problem_prompt)
VALUES(1, 'a', 'Plain text', 'a');
INSERT INTO invitations(id, hiring_manager_id, candidate_id, template_id, invitation_status)
VALUES(1, 1, 1, 1, "sent");

-- Identify the relations
ALTER TABLE hiring_managers
	ADD FOREIGN KEY (candidate_id) REFERENCES candidates(id),
	ADD FOREIGN KEY (template_id) REFERENCES templates(id),
	ADD FOREIGN KEY (scenario_id) REFERENCES scenarios(id);
ALTER TABLE hiring_managers_accounts
	ADD FOREIGN KEY (hiring_manager_id) REFERENCES hiring_managers(id);
ALTER TABLE candidates_accounts
	ADD FOREIGN KEY (candidate_id) REFERENCES candidates(id);
ALTER TABLE templates
	ADD FOREIGN KEY (scenario_id) REFERENCES scenarios(id);
ALTER TABLE invitations
	ADD FOREIGN KEY (hiring_manager_id) REFERENCES hiring_managers(id),
	ADD FOREIGN KEY (candidate_id) REFERENCES candidates(id),
	ADD FOREIGN KEY (template_id) REFERENCES templates(id);
