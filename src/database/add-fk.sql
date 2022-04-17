ALTER TABLE hiring_managers 
ADD FOREIGN KEY (candidate_id) REFERENCES candidates(id),  
ADD FOREIGN KEY (position_id) REFERENCES positions(id);

ALTER TABLE hiring_managers_accounts
ADD FOREIGN KEY (hiring_manager_id) REFERENCES hiring_managers(id);

ALTER TABLE candidates
ADD FOREIGN KEY (hiring_manager_id) REFERENCES hiring_managers(id),
ADD FOREIGN KEY (assessment_id) REFERENCES assessments(id);

ALTER TABLE candidates_accounts
ADD FOREIGN KEY (candidate_id) REFERENCES candidates(id);

ALTER TABLE positions
ADD FOREIGN KEY (assessment_id) REFERENCES assessments(id);

ALTER TABLE assessments
ADD FOREIGN KEY (hiring_manager_id) REFERENCES hiring_managers(id),
ADD FOREIGN KEY (candidate_id) REFERENCES candidates(id);












