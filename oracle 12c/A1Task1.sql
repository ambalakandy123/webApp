-- DROP USER AND TABLESPACE
DROP  USER  scm_jc500672 CASCADE;
DROP TABLESPACE scmts_jc500672 INCLUDING CONTENTS AND DATAFILES;

-- TABLESPACE
CREATE SMALLFILE TABLESPACE scmts_jc500672
DATAFILE 'scmts_jc500672.dbf' SIZE 100M AUTOEXTEND ON NEXT 10M;

-- USER SQL
CREATE USER "scm_jc500672" IDENTIFIED BY "oracle"  
DEFAULT TABLESPACE "SCMTS_JC500672"
TEMPORARY TABLESPACE "TEMP";

-- QUOTAS
ALTER USER "scm_jc500672" QUOTA 100M ON "SCMTS_JC500672";

-- ROLES
GRANT "CONNECT" TO "scm_jc500672" WITH ADMIN OPTION;

-- SYSTEM PRIVILEGES
GRANT CREATE TRIGGER TO "scm_jc500672" ;
GRANT CREATE VIEW TO "scm_jc500672" ;
GRANT CREATE TABLE TO "scm_jc500672" ;
GRANT CREATE SYNONYM TO "scm_jc500672" ;
GRANT CREATE SEQUENCE TO "scm_jc500672" ;
GRANT CREATE USER TO "scm_jc500672" ;
GRANT CREATE PROCEDURE TO "scm_jc500672" ;