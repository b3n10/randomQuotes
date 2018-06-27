CREATE TABLE posts (id SERIAL PRIMARY KEY, author VARCHAR(30), text VARCHAR(200), date_added TIMESTAMP WITH TIME ZONE, approved SMALLINT);

ALTER TABLE posts ALTER COLUMN approved SET DEFAULT 0;

ALTER DATABASE dq2ug9i8fp2h0 SET timezone TO 'Asia/Manila';

ALTER TABLE posts ALTER COLUMN date_added SET DEFAULT date_trunc('second', now()::timestamp);

ALTER TABLE posts ALTER COLUMN date_added TYPE TIMESTAMP WITH TIME ZONE USING date_added AT TIME ZONE 'Asia/Manila';
