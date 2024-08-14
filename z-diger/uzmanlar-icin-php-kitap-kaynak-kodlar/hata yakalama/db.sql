CREATE TABLE php_error_log (
	id SERIAL,
	url VARCHAR,
	get TEXT,
	post TEXT,
	session TEXT,
	cookie TEXT,
	reg_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT now(),
	execute_time REAL,
	client_ip_address INET,
	server_ip_address INET,
	error_no INTEGER,
	file VARCHAR(200),
	line INTEGER,
	message TEXT,
	host VARCHAR(50)
)
WITH (oids = false);

CREATE INDEX php_error_log_idx ON php_error_log USING btree (host COLLATE pg_catalog."default");