INSERT INTO hiring_managers(id, name, candidate_id, position_id)
VALUES(1, 'Example', 1, 1);

INSERT INTO hiring_managers_accounts(id, user_name, encrypted_password, hiring_manager_id)
VALUES(1, 'Example', 'aa', 1);

INSERT INTO candidates(id, name, hiring_manager_id, assessment_id)
VALUES(1, 'Example', 1, 1);

INSERT INTO candidates_accounts(id, user_name, encrypted_password, candidate_id)
VALUES(1, 'Example', 'aa', 1);

INSERT INTO positions(id, name, description, assessment_id)
VALUES(1, 'Example', 'aa', 1);

INSERT INTO assessments(id, position_id, difficulty, hiring_manager_id, candidate_id, score)
VALUES(1, 1, 'entry', 1, 1, 0);


